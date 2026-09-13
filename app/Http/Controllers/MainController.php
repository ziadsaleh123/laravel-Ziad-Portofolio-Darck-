<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;

use App\Models\Home;
use App\Models\About;
use App\Models\Service;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SocialLink;
use App\Models\Message;

class MainController extends Controller
{
    // ================= PORTFOLIO =================
    public function portfolio()
    {
        $home = Home::first();
        $about = About::first();

        $socialLinks = SocialLink::orderBy('sort_order')->get();

        $services = Schema::hasTable('services')
            ? Service::latest()
                ->where(function ($q) {
                    $q->where('service_status', 'متاحة')
                      ->orWhereNull('service_status');
                })
                ->get()
            : collect();

        $skills = Schema::hasTable('skills')
            ? Skill::latest()->get()
            : collect();

        $projects = Schema::hasTable('projects')
            ? Project::latest()->get()
            : collect();

        return view('portofolio', compact(
            'home',
            'about',
            'socialLinks',
            'services',
            'projects',
            'skills'
        ));
    }

    // ================= DASHBOARD =================
    public function dashboard(Request $request, $page, $id = null)
    {
        $home = Home::first();
        $about = About::first();

        $socialLinks = SocialLink::orderBy('sort_order')->get();

        $services = Schema::hasTable('services')
            ? Service::latest()->get()
            : collect();

        $projects = Schema::hasTable('projects')
            ? Project::latest()->get()
            : collect();

        $skills = Schema::hasTable('skills')
            ? Skill::latest()->get()
            : collect();

        $messages = Schema::hasTable('messages')
            ? Message::latest()->get()
            : collect();

        $unreadMessagesCount = Schema::hasTable('messages')
            ? Message::where('is_read', false)->count()
            : 0;

        $editSkill = null;
        $editService = null;
        $editProject = null;
        $editSocial = null;

        if ($page === 'skills' && $id) {
            $editSkill = Skill::findOrFail($id);
        }

        if ($page === 'services' && $request->has('editService')) {
            $editService = Service::findOrFail($request->editService);
        }

        if ($page === 'projects' && $request->has('editProject')) {
            $editProject = Project::findOrFail($request->editProject);
        }

        if ($page === 'contact' && $request->has('editSocial')) {
            $editSocial = SocialLink::findOrFail($request->editSocial);
        }

        return view('dashboard', compact(
            'home',
            'about',
            'socialLinks',
            'services',
            'projects',
            'skills',
            'messages',
            'unreadMessagesCount',
            'editSkill',
            'editService',
            'editProject',
            'editSocial'
        ))->with('page', $page);
    }

    // ================= HOME =================
    public function updateHome(Request $request)
    {
        $data = $request->validate([
            'logo' => 'nullable|string|max:255',
            'main_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'experience_years' => 'nullable|string|max:50',
            'projects_count' => 'nullable|string|max:50',
            'skills_count' => 'nullable|string|max:50',
            'happy_clients' => 'nullable|string|max:50',
        ]);

        $home = Home::firstOrCreate([]);

        if ($request->hasFile('main_image')) {
            if ($home->main_image) {
                Storage::disk('public')->delete($home->main_image);
            }

            $data['main_image'] = $request->file('main_image')
                ->store('home', 'public');
        }

        $home->update($data);

        return back()->with('success', 'تم حفظ بيانات الصفحة الرئيسية بنجاح');
    }

    // ================= ABOUT =================
    public function updateAbout(Request $request)
    {
        $data = $request->validate([
            'section_title' => 'nullable|string|max:255',
            'section_description' => 'nullable|string',
            'badge' => 'nullable|string|max:255',
            'main_title' => 'nullable|string|max:255',
            'paragraph_one' => 'nullable|string',
            'paragraph_two' => 'nullable|string',
            'name' => 'nullable|string|max:255',
            'specialty' => 'nullable|string|max:255',
            'focus' => 'nullable|string|max:255',
            'goal' => 'nullable|string|max:255',
        ]);

        $about = About::firstOrCreate([]);
        $about->update($data);

        return back()->with('success', 'تم حفظ بيانات قسم من أنا بنجاح');
    }

    // ================= SERVICES =================
    public function updateService(Request $request)
    {
        $data = $request->validate([
            'service_title' => 'required|string|max:255',
            'service_description' => 'required|string',
            'service_status' => 'nullable|string|max:255',
            'service_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $service = $request->id
            ? Service::findOrFail($request->id)
            : new Service();

        if ($request->hasFile('service_image')) {
            if ($service->service_image) {
                Storage::disk('public')->delete($service->service_image);
            }

            $data['service_image'] = $request->file('service_image')
                ->store('services', 'public');
        }

        $service->fill($data);
        $service->save();

        return back()->with('success', 'تم حفظ الخدمة');
    }

    // ================= PROJECTS =================
    public function storeProject(Request $request)
    {
        $data = $request->validate([
            'project_name' => 'required|string|max:255',
            'project_link' => 'required|string|max:255',
            'project_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('project_image')) {
            $data['project_image'] = $request->file('project_image')
                ->store('projects', 'public');
        }

        Project::create($data);

        return back()->with('success', 'تم إضافة المشروع بنجاح');
    }

    public function updateProject(Request $request, $id)
    {
        $data = $request->validate([
            'project_name' => 'required|string|max:255',
            'project_link' => 'required|string|max:255',
            'project_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $project = Project::findOrFail($id);

        if ($request->hasFile('project_image')) {
            if ($project->project_image) {
                Storage::disk('public')->delete($project->project_image);
            }

            $data['project_image'] = $request->file('project_image')
                ->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('dashboard.page', ['page' => 'projects'])->with('success', 'تم تعديل المشروع بنجاح');
    }

    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);

        if ($project->project_image) {
            Storage::disk('public')->delete($project->project_image);
        }

        $project->delete();

        return redirect()->route('dashboard.page', ['page' => 'projects'])->with('success', 'تم حذف المشروع بنجاح');
    }

    // ================= SKILLS =================
    public function skillsStoreOrUpdate(Request $request)
    {
        $request->validate([
            'skill_name' => 'required|string|max:255',
            'skill_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $skill = $request->id
            ? Skill::findOrFail($request->id)
            : new Skill();

        $skill->skill_name = $request->skill_name;

        if ($request->hasFile('skill_image')) {
            if ($skill->skill_image) {
                Storage::disk('public')->delete($skill->skill_image);
            }

            $skill->skill_image = $request->file('skill_image')
                ->store('skills', 'public');
        }

        $skill->save();

        return back()->with('success', 'تم حفظ المهارة');
    }

    // ================= SOCIAL LINKS & CONTACT NUMBERS =================

    public function storeSocial(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url'  => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        $name = $request->input('name');
        $url  = trim($request->input('url'));
        $nameLower = strtolower($name);

        // إذا كان واتساب أو هاتف/اتصال
        if (str_contains($nameLower, 'whatsapp') || str_contains($nameLower, 'واتساب')) {
            $phone = preg_replace('/[^0-9]/', '', $url);
            if (!empty($phone) && !str_starts_with($phone, '967') && !str_starts_with($phone, '00967')) {
                // إذا الرقم محلي يبدأ بـ 7 أو 07 أضف 967
                $clean = ltrim($phone, '0');
                $phone = '967' . $clean;
            }
            $url = $phone;
        }

        SocialLink::create([
            'name' => $name,
            'url'  => $url,
            'icon' => $request->input('icon') ?: 'ri-link',
        ]);

        return redirect()->route('dashboard.page', ['page' => 'contact'])->with('success', 'تم إضافة وسيلة التواصل بنجاح');
    }

    public function updateSocial(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url'  => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        $link = SocialLink::findOrFail($id);
        $name = $request->input('name');
        $url  = trim($request->input('url'));
        $nameLower = strtolower($name);

        // إذا كان واتساب أو هاتف/اتصال
        if (str_contains($nameLower, 'whatsapp') || str_contains($nameLower, 'واتساب')) {
            $phone = preg_replace('/[^0-9]/', '', $url);
            if (!empty($phone) && !str_starts_with($phone, '967') && !str_starts_with($phone, '00967')) {
                $clean = ltrim($phone, '0');
                $phone = '967' . $clean;
            }
            $url = $phone;
        }

        $link->update([
            'name' => $name,
            'url'  => $url,
            'icon' => $request->input('icon') ?: 'ri-link',
        ]);

        return redirect()->route('dashboard.page', ['page' => 'contact'])->with('success', 'تم تعديل وسيلة التواصل بنجاح');
    }

    public function deleteSocial($id)
    {
        $link = SocialLink::findOrFail($id);

        $link->delete();

        return redirect()->route('dashboard.page', ['page' => 'contact'])->with('success', 'تم حذف وسيلة التواصل');
    }

    // ================= MESSAGES =================

    public function sendMessage(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'whatsapp' => 'nullable|string|max:50',
            'subject'  => 'nullable|string|max:255',
            'message'  => 'required|string',
        ]);

        $message = Message::create($data);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'status'  => 'success',
                'message' => 'تم حفظ الرسالة بنجاح',
                'data'    => $message,
            ]);
        }

        return back()->with('success', 'تم إرسال الرسالة بنجاح');
    }

    public function deleteMessage($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('dashboard.page', ['page' => 'messages'])
            ->with('success', 'تم حذف الرسالة بنجاح');
    }

    public function toggleMessageRead($id)
    {
        $message = Message::findOrFail($id);
        $message->update([
            'is_read' => !$message->is_read
        ]);

        return redirect()->route('dashboard.page', ['page' => 'messages'])
            ->with('success', $message->is_read ? 'تم تحديد الرسالة كمقروءة' : 'تم تحديد الرسالة كغير مقروءة');
    }
}