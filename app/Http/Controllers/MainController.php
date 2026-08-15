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

class MainController extends Controller
{
    // ================= PORTFOLIO =================
    public function portfolio()
    {
        $home = Home::first();
        $about = About::first();

        $socialLinks = SocialLink::orderBy('sort_order')->get();

        $services = Schema::hasTable('services')
            ? Service::latest()->get()
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

        $editSkill = null;

        if ($page === 'skills' && $id) {
            $editSkill = Skill::findOrFail($id);
        }

        return view('dashboard', compact(
            'home',
            'about',
            'socialLinks',
            'services',
            'projects',
            'skills',
            'editSkill'
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

        return back()->with('success', 'تم حفظ المشروع');
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

    // ================= SOCIAL LINKS (NEW SYSTEM) =================

  public function storeSocial(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'url'  => 'required|string|max:255',
        'icon' => 'nullable|string|max:255',
    ]);

    $url = $request->url;

    // 🔥 إذا واتساب: تنظيف + إضافة كود الدولة تلقائيًا
    if (str_contains(strtolower($request->name), 'whatsapp')) {

        $phone = preg_replace('/[^0-9]/', '', $url);

        // إذا ما فيه كود دولة أضف اليمن
        if (!str_starts_with($phone, '967')) {
            $phone = '967' . $phone;
        }

        $url = $phone;
    }

    SocialLink::create([
        'name' => $request->name,
        'url'  => $url,
        'icon' => $request->icon,
    ]);

    return back()->with('success', 'تم إضافة منصة جديدة');

    
}
public function deleteSocial($id)
{
    $link = SocialLink::findOrFail($id);

    $link->delete();

    return back()->with('success', 'تم حذف رابط التواصل');
}
}