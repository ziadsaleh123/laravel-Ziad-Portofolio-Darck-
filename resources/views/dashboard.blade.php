<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-950 text-white">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-72 bg-gray-900 border-l border-gray-800 p-5 hidden md:block">
            <h2 class="text-2xl font-bold mb-8">لوحة التحكم</h2>

            <nav class="space-y-3">
                <a href="?page=home" class="nav-btn">الرئيسية</a>
                <a href="?page=about" class="nav-btn">من أنا</a>
                <a href="?page=services" class="nav-btn">الخدمات</a>
                <a href="?page=projects" class="nav-btn">المشاريع</a>
                <a href="?page=skills" class="nav-btn">المهارات</a>
                <a href="?page=contact" class="nav-btn">تواصل</a>
                <a href="?page=messages" class="nav-btn">الرسائل</a>
            </nav>

            <form method="POST" action="{{ route('logout') }}" class="mt-8">
                @csrf
                <button class="w-full bg-red-600 hover:bg-red-700 py-3 rounded-xl">
                    تسجيل الخروج
                </button>
            </form>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-6">

            <header class="bg-gray-900 border border-gray-800 rounded-2xl p-5 mb-6">
                <h1 class="text-2xl font-bold">مرحباً {{ Auth::user()->name }}</h1>
                <p class="text-gray-400 text-sm">إدارة محتوى الموقع</p>
            </header>

            @php
                $page = request('page', 'home');
            @endphp


            <!-- ================= HOME ================= -->
            @if ($page == 'home')

                @if (session('success'))
                    <div class="mb-4 rounded-xl bg-green-600 p-4 text-white">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">

                    <h2 class="mb-6 text-2xl font-bold">
                        الرئيسية
                    </h2>

                    <!-- ================= FORM ================= -->
                    <form method="POST" action="{{ route('home.update') }}" enctype="multipart/form-data"
                        class="space-y-5">

                        @csrf

                        @php
                            $editMode = session('home_edit_mode', false);
                        @endphp

                        <!-- الاسم -->
                        <div>
                            <label>الاسم</label>

                            <input id="logo" type="text" name="logo" value="{{ $home->logo ?? '' }}"
                                class="input" {{ !$editMode ? 'readonly' : '' }}>
                        </div>

                        <!-- العنوان الرئيسي -->
                        <div>
                            <label>العنوان الرئيسي</label>

                            <input id="main_title" type="text" name="main_title"
                                value="{{ $home->main_title ?? '' }}" class="input" {{ !$editMode ? 'readonly' : '' }}>
                        </div>

                        <!-- الوصف -->
                        <div>
                            <label>الوصف</label>

                            <textarea id="description" name="description" rows="5" class="input" {{ !$editMode ? 'readonly' : '' }}>{{ $home->description ?? '' }}</textarea>
                        </div>

                        <!-- الصورة -->
                        <div>
                            <label>الصورة الرئيسية</label>

                            <input id="main_image" type="file" name="main_image" class="input"
                                {{ !$editMode ? 'disabled' : '' }}>

                            @if (!empty($home->main_image))
                                <img src="{{ asset('storage/' . $home->main_image) }}"
                                    class="mt-4 h-32 w-32 rounded-2xl border border-gray-300 object-cover">
                            @endif
                        </div>

                        <!-- سنوات الخبرة -->
                        <div>
                            <label>سنوات خبرة</label>

                            <input id="experience_years" type="text" name="experience_years"
                                value="{{ $home->experience_years ?? '' }}" class="input"
                                {{ !$editMode ? 'readonly' : '' }}>
                        </div>

                        <!-- عدد المشاريع -->
                        <div>
                            <label>عدد المشاريع</label>

                            <input id="projects_count" type="text" name="projects_count"
                                value="{{ $home->projects_count ?? '' }}" class="input"
                                {{ !$editMode ? 'readonly' : '' }}>
                        </div>

                        <!-- عدد المهارات -->
                        <div>
                            <label>عدد المهارات</label>

                            <input id="skills_count" type="text" name="skills_count"
                                value="{{ $home->skills_count ?? '' }}" class="input"
                                {{ !$editMode ? 'readonly' : '' }}>
                        </div>

                        <!-- العملاء -->
                        <div>
                            <label>عملاء راضون</label>

                            <input id="happy_clients" type="text" name="happy_clients"
                                value="{{ $home->happy_clients ?? '' }}" class="input"
                                {{ !$editMode ? 'readonly' : '' }}>
                        </div>

                        <!-- الأزرار -->
                        <div class="flex flex-wrap gap-3">

                            @if (!$editMode)
                                <button type="button" onclick="enableHomeEdit()"
                                    class="rounded-xl bg-yellow-500 px-6 py-3 text-white transition hover:bg-yellow-600">
                                    تعديل
                                </button>
                            @endif

                            <button type="submit"
                                class="rounded-xl bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                                حفظ التغييرات
                            </button>

                        </div>

                    </form>
                    <!-- لا توجد بيانات -->
                    @if (!$home)
                        <div class="mt-10 rounded-xl bg-gray-800 p-4 text-gray-300">
                            لا توجد بيانات حالياً، قم بإضافة البيانات ثم اضغط حفظ.
                        </div>
                    @endif

                </div>

                <!-- ================= SCRIPT ================= -->
                <script>
                    function editHome() {

                        const fields = [
                            'logo',
                            'main_title',
                            'description',
                            'experience_years',
                            'projects_count',
                            'skills_count',
                            'happy_clients'
                        ];

                        fields.forEach(function(id) {

                            let element = document.getElementById(id);

                            if (element) {
                                element.removeAttribute('readonly');
                            }

                        });

                        // تفعيل رفع الصورة
                        let imageInput = document.getElementById('main_image');

                        if (imageInput) {
                            imageInput.removeAttribute('disabled');
                        }

                        // ================= رسالة التعديل =================

                        const oldAlert = document.getElementById('edit-alert');

                        if (oldAlert) {
                            oldAlert.remove();
                        }

                        const alertBox = document.createElement('div');

                        alertBox.id = 'edit-alert';

                        alertBox.className =
                            'mb-4 rounded-xl bg-yellow-500 p-4 text-white font-semibold';

                        alertBox.innerText = 'تم فتح وضع التعديل بنجاح';

                        const card = document.querySelector('.card');

                        card.prepend(alertBox);

                        // اختفاء الرسالة بعد 3 ثواني
                        setTimeout(() => {

                            const alert = document.getElementById('edit-alert');

                            if (alert) {
                                alert.remove();
                            }

                        }, 3000);

                    }
                </script>

            @endif

            
            <!-- ================= ABOUT DASHBOARD ================= -->
            @php
                $isEditing = session('edit_mode', false);
            @endphp

            @if ($page == 'about')

                <div
                    class="rounded-[2rem] border border-slate-200 bg-white/80 p-8 dark:border-white/10 dark:bg-white/5">

                    <!-- رسالة النجاح -->
                    @if (session('success'))
                        <div
                            class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-400/10 px-5 py-4 text-emerald-500 dark:text-emerald-400">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- العنوان -->
                    <div class="mb-8">
                        <h2 class="text-3xl font-black text-emerald-500 dark:text-emerald-400">
                            تعديل قسم من أنا
                        </h2>

                        <p class="mt-2 text-slate-500 dark:text-white/60">
                            يمكنك تعديل جميع بيانات قسم "من أنا" الظاهر في الصفحة الرئيسية.
                        </p>
                    </div>

                    <!-- زر فتح التعديل -->
                    @if (!$isEditing)
                        <form method="POST" action="{{ route('about.edit.mode') }}">
                            @csrf

                            <button type="submit"
                                class="rounded-2xl border border-emerald-500 px-6 py-3 font-bold text-emerald-500 transition hover:bg-emerald-500 hover:text-white">

                                تعديل البيانات

                            </button>

                        </form>
                    @endif

                    <!-- الفورم -->
                    @if ($isEditing)
                        <form method="POST" action="{{ route('about.update') }}" class="space-y-6">

                            @csrf

                            <!-- العنوان الرئيسي -->
                            <div>
                                <label class="mb-2 block text-sm font-bold text-slate-600 dark:text-white/70">
                                    العنوان الرئيسي
                                </label>

                                <input type="text" name="section_title"
                                    value="{{ $about->section_title ?? 'من أنا' }}"
                                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-emerald-400 dark:border-white/10 dark:bg-white/5 dark:text-white">
                            </div>

                            <!-- الوصف -->
                            <div>
                                <label class="mb-2 block text-sm font-bold text-slate-600 dark:text-white/70">
                                    الوصف المختصر
                                </label>

                                <textarea name="section_description" rows="4"
                                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-emerald-400 dark:border-white/10 dark:bg-white/5 dark:text-white">{{ $about->section_description ?? '' }}</textarea>
                            </div>

                            <!-- الشارة -->
                            <div>
                                <label class="mb-2 block text-sm font-bold text-slate-600 dark:text-white/70">
                                    الشارة
                                </label>

                                <input type="text" name="badge" value="{{ $about->badge ?? '' }}"
                                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-emerald-400 dark:border-white/10 dark:bg-white/5 dark:text-white">
                            </div>

                            <!-- العنوان الكبير -->
                            <div>
                                <label class="mb-2 block text-sm font-bold text-slate-600 dark:text-white/70">
                                    العنوان الكبير
                                </label>

                                <input type="text" name="main_title" value="{{ $about->main_title ?? '' }}"
                                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-emerald-400 dark:border-white/10 dark:bg-white/5 dark:text-white">
                            </div>

                            <!-- الفقرة الأولى -->
                            <div>
                                <textarea name="paragraph_one" rows="5"
                                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:bg-white/5 dark:text-white">{{ $about->paragraph_one ?? '' }}</textarea>
                            </div>

                            <!-- الفقرة الثانية -->
                            <div>
                                <textarea name="paragraph_two" rows="5"
                                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:bg-white/5 dark:text-white">{{ $about->paragraph_two ?? '' }}</textarea>
                            </div>

                            <!-- البطاقات -->
                            <div class="grid gap-5 md:grid-cols-2">

                                <input type="text" name="name" value="{{ $about->name ?? '' }}"
                                    placeholder="الاسم" class="input">

                                <input type="text" name="specialty" value="{{ $about->specialty ?? '' }}"
                                    placeholder="التخصص" class="input">

                                <input type="text" name="focus" value="{{ $about->focus ?? '' }}"
                                    placeholder="التركيز" class="input">

                                <input type="text" name="goal" value="{{ $about->goal ?? '' }}"
                                    placeholder="الهدف" class="input">

                            </div>

                            <!-- زر الحفظ -->
                            <div class="flex gap-4">

                                <button type="submit"
                                    class="rounded-2xl bg-emerald-500 px-6 py-3 font-bold text-white hover:bg-emerald-600">

                                    حفظ التعديلات

                                </button>

                            </div>

                        </form>

                        <!-- فورم مستقل للإلغاء -->
                        <form method="POST" action="{{ route('about.close.mode') }}" class="mt-4">

                            @csrf

                            <button type="submit"
                                class="rounded-2xl border border-slate-300 px-6 py-3 font-bold text-slate-600 hover:bg-slate-100">

                                إلغاء

                            </button>

                        </form>
                    @endif

                </div>

            @endif


            <!-- ================= SERVICES ================= -->

            @if ($page == 'services')

                @php
                    $isEditing = !empty($service);
                @endphp

                <div class="card rounded-2xl bg-white p-6 shadow-sm dark:bg-white/5">

                    <h2 class="mb-6 text-2xl font-bold text-slate-800 dark:text-white">
                        {{ $isEditing ? 'تعديل الخدمة' : 'إضافة خدمة' }}
                    </h2>

                    <!-- ================= FORM ================= -->
                    <form method="POST" action="{{ route('services.update') }}" enctype="multipart/form-data"
                        class="space-y-5">

                        @csrf

                        @if ($isEditing)
                            <input type="hidden" name="id" value="{{ $service->id }}">
                        @endif

                        <!-- عنوان الخدمة -->
                        <div>
                            <label class="block mb-2">عنوان الخدمة</label>
                            <input type="text" name="service_title"
                                value="{{ old('service_title', $service->service_title ?? '') }}" class="input"
                                required>
                        </div>

                        <!-- وصف الخدمة -->
                        <div>
                            <label class="block mb-2">وصف الخدمة</label>
                            <textarea name="service_description" class="input" rows="4" required>{{ old('service_description', $service->service_description ?? '') }}</textarea>
                        </div>

                        <!-- الحالة -->
                        <div>
                            <label class="block mb-2">الحالة</label>
                            <input type="text" name="service_status"
                                value="{{ old('service_status', $service->service_status ?? 'متاحة') }}"
                                class="input">
                        </div>

                        <!-- الصورة -->
                        <div>
                            <label class="block mb-2">صورة الخدمة</label>

                            <input type="file" name="service_image" class="input">

                            @if (!empty($service->service_image))
                                <img src="{{ asset('storage/' . $service->service_image) }}"
                                    class="mt-3 h-20 w-20 rounded-xl object-cover border">
                            @endif
                        </div>

                        <!-- الأزرار -->
                        <div class="flex gap-3">

                            <button type="submit"
                                class="bg-emerald-600 hover:bg-emerald-700 px-6 py-3 rounded-xl text-white">
                                {{ $isEditing ? 'تحديث الخدمة' : 'إضافة الخدمة' }}
                            </button>

                            @if ($isEditing)
                                <a href="{{ route('dashboard', ['page' => 'services']) }}"
                                    class="bg-gray-600 hover:bg-gray-700 px-6 py-3 rounded-xl text-white">
                                    إلغاء
                                </a>
                            @endif

                        </div>

                    </form>

                    <!-- ================= TABLE ================= -->
                    <div class="mt-10 overflow-x-auto">

                        <table class="w-full text-right border-collapse">

                            <thead>
                                <tr class="border-b border-gray-300 dark:border-white/10">
                                    <th class="p-3">الصورة</th>
                                    <th class="p-3">العنوان</th>
                                    <th class="p-3">الوصف</th>
                                    <th class="p-3">الحالة</th>
                                    <th class="p-3">الإجراءات</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($services as $item)
                                    <tr class="border-b border-gray-200 dark:border-white/5">

                                        <!-- الصورة -->
                                        <td class="p-3">
                                            @if ($item->service_image)
                                                <img src="{{ asset('storage/' . $item->service_image) }}"
                                                    class="h-12 w-12 rounded-lg object-cover border">
                                            @else
                                                <span class="text-gray-400 text-sm">لا توجد</span>
                                            @endif
                                        </td>

                                        <!-- العنوان -->
                                        <td class="p-3">{{ e($item->service_title) }}</td>

                                        <!-- الوصف -->
                                        <td class="p-3">{{ e($item->service_description) }}</td>

                                        <!-- الحالة -->
                                        <td class="p-3">
                                            <span
                                                class="px-3 py-1 rounded-full text-sm bg-emerald-100 text-emerald-600 dark:bg-emerald-400/10">
                                                {{ $item->service_status ?? 'متاحة' }}
                                            </span>
                                        </td>

                                        <!-- الإجراءات -->
                                        <td class="p-3 flex gap-2">

                                            <!-- تعديل -->
                                            <a href="{{ route('dashboard.page', [
                                                'page' => 'services',
                                                'editService' => $item->id,
                                            ]) }}"
                                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-sm">
                                                تعديل
                                            </a>

                                            <!-- حذف -->
                                            <form method="POST" action="{{ route('services.delete', $item->id) }}"
                                                onsubmit="return confirm('هل أنت متأكد من حذف هذه الخدمة؟')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm">
                                                    حذف
                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="5" class="text-center p-6 text-gray-400">
                                            لا توجد خدمات حالياً
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            @endif

            <!-- ================= PROJECTS ================= -->


            @if ($page == 'projects')

                <div
                    class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-white/5">

                    <!-- العنوان -->
                    <div class="mb-8">
                        <h2 class="text-3xl font-black text-slate-800 dark:text-white">
                            إدارة المشاريع
                        </h2>

                        <p class="mt-2 text-sm text-slate-500 dark:text-white/60">
                            قم بإضافة وتعديل المشاريع الخاصة بك.
                        </p>
                    </div>

                    <!-- رسالة النجاح -->
                    @if (session('success'))
                        <div
                            class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-500/10 px-5 py-4 text-sm font-medium text-emerald-600 dark:text-emerald-400">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!---- الفورم ---->
                    <form method="POST"
                        action="{{ isset($editProject) ? route('projects.update', $editProject->id) : route('projects.store') }}"
                        enctype="multipart/form-data" class="space-y-6">

                        @csrf

                        @if (isset($editProject))
                            @method('PUT')
                        @endif

                        <!-- اسم المشروع -->
                        <div>
                            <label class="mb-2 block text-sm font-bold text-slate-700 dark:text-white/80">
                                اسم المشروع
                            </label>

                            <input type="text" name="project_name"
                                value="{{ old('project_name', $editProject->project_name ?? '') }}"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-slate-800 outline-none transition focus:border-emerald-400 focus:ring-4 focus:ring-emerald-400/10 dark:border-white/10 dark:bg-white/5 dark:text-white"
                                placeholder="أدخل اسم المشروع">
                        </div>

                        <!-- رابط المشروع -->
                        <div>
                            <label class="mb-2 block text-sm font-bold text-slate-700 dark:text-white/80">
                                رابط المشروع
                            </label>

                            <input type="url" name="project_link"
                                value="{{ old('project_link', $editProject->project_link ?? '') }}"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-slate-800 outline-none transition focus:border-emerald-400 focus:ring-4 focus:ring-emerald-400/10 dark:border-white/10 dark:bg-white/5 dark:text-white"
                                placeholder="https://example.com">
                        </div>

                        <!-- صورة المشروع -->
                        <div>
                            <label class="mb-2 block text-sm font-bold text-slate-700 dark:text-white/80">
                                صورة المشروع
                            </label>

                            <input type="file" name="project_image"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-slate-700 outline-none transition file:mr-4 file:rounded-xl file:border-0 file:bg-emerald-500 file:px-4 file:py-2 file:text-white hover:file:bg-emerald-600 dark:border-white/10 dark:bg-white/5 dark:text-white">

                            @if (isset($editProject) && $editProject->project_image)
                                <img src="{{ asset('storage/' . $editProject->project_image) }}"
                                    class="mt-3 h-24 w-32 rounded-xl object-cover">
                            @endif
                        </div>

                        <!-- زر -->
                        <div class="pt-2">
                            <button class="rounded-2xl bg-emerald-500 px-8 py-4 text-sm font-bold text-white">
                                {{ isset($editProject) ? 'تحديث المشروع' : 'حفظ المشروع' }}
                            </button>
                        </div>

                    </form>

                    <!-- جدول المشاريع -->
                    <div class="mt-10 overflow-x-auto">
                        <table class="w-full overflow-hidden rounded-2xl border border-slate-200 dark:border-white/10">

                            <!-- thead -->
                            <thead class="bg-slate-100 dark:bg-white/10">
                                <tr>
                                    <th class="px-5 py-4 text-right text-sm font-bold text-slate-700 dark:text-white">
                                        الصورة
                                    </th>

                                    <th class="px-5 py-4 text-right text-sm font-bold text-slate-700 dark:text-white">
                                        اسم المشروع
                                    </th>

                                    <th class="px-5 py-4 text-right text-sm font-bold text-slate-700 dark:text-white">
                                        الرابط
                                    </th>

                                    <th class="px-5 py-4 text-right text-sm font-bold text-slate-700 dark:text-white">
                                        العمليات
                                    </th>
                                </tr>
                            </thead>

                            <!-- tbody -->
                            <tbody class="divide-y divide-slate-200 dark:divide-white/10">

                                @foreach ($projects as $item)
                                    <tr class="bg-white dark:bg-transparent">

                                        <!-- الصورة -->
                                        <td class="px-5 py-4">
                                            <img src="{{ asset('storage/' . $item->project_image) }}" alt="project"
                                                class="h-16 w-24 rounded-xl object-cover">
                                        </td>

                                        <!-- الاسم -->
                                        <td class="px-5 py-4 font-medium text-slate-700 dark:text-white">
                                            {{ $item->project_name }}
                                        </td>

                                        <!-- الرابط -->
                                        <td class="px-5 py-4">
                                            <a href="{{ $item->project_link }}" target="_blank"
                                                class="text-emerald-500 hover:underline truncate max-w-[200px] inline-block">

                                                {{ parse_url($item->project_link, PHP_URL_HOST) ?? $item->project_link }}

                                            </a>
                                        </td>

                                        <!-- العمليات -->
                                        <td class="px-5 py-4">
                                            <div class="flex items-center gap-3">

                                                <a href="{{ route('dashboard.page', ['page' => 'projects', 'editProject' => $item->id]) }}"
                                                    class="rounded-xl bg-blue-500 px-4 py-2 text-sm font-bold text-white hover:bg-blue-600">
                                                    تعديل
                                                </a>

                                                <a href="#"
                                                    class="rounded-xl bg-red-500 px-4 py-2 text-sm font-bold text-white hover:bg-red-600">
                                                    حذف
                                                </a>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>

                </div>

            @endif


            <!-- ================= SKILLS ================= -->
            @if ($page == 'skills')

                <div class="card">

                    <h2 class="text-2xl font-bold mb-6">
                        المهارات
                    </h2>

                    <!-- ================= FORM ================= -->
                    <form method="POST" action="{{ route('skills.storeOrUpdate') }}" enctype="multipart/form-data"
                        class="space-y-5">

                        @csrf

                        <!-- ID عند التعديل -->
                        @if (isset($editSkill))
                            <input type="hidden" name="id" value="{{ $editSkill->id }}">
                        @endif

                        <!-- اسم المهارة -->
                        <div>
                            <label>اسم المهارة</label>

                            <input type="text" name="skill_name"
                                value="{{ old('skill_name', $editSkill->skill_name ?? '') }}" class="input"
                                placeholder="مثال: Laravel">
                        </div>

                        <!-- صورة المهارة -->
                        <div>
                            <label>صورة المهارة</label>

                            <input type="file" name="skill_image" class="input">

                            @if (isset($editSkill) && $editSkill->skill_image)
                                <img src="{{ asset('storage/' . $editSkill->skill_image) }}"
                                    class="mt-4 h-20 w-20 rounded-xl border object-cover">
                            @endif
                        </div>

                        <!-- زر الحفظ -->
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-xl text-white">

                            {{ isset($editSkill) ? 'تحديث المهارة' : 'حفظ التغييرات' }}

                        </button>

                    </form>

                    <!-- ================= TABLE ================= -->
                    <div class="mt-10 overflow-x-auto">

                        <table class="w-full text-right border-collapse">

                            <!-- thead -->
                            <thead>
                                <tr class="border-b border-gray-700">

                                    <th class="p-4">
                                        الصورة
                                    </th>

                                    <th class="p-4">
                                        اسم المهارة
                                    </th>

                                    <th class="p-4">
                                        الإجراءات
                                    </th>

                                </tr>
                            </thead>

                            <!-- tbody -->
                            <tbody>

                                @forelse ($skills as $item)
                                    <tr class="border-b border-gray-800">

                                        <!-- الصورة -->
                                        <td class="p-4">

                                            @if ($item->skill_image)
                                                <img src="{{ asset('storage/' . $item->skill_image) }}"
                                                    class="h-14 w-14 rounded-xl object-cover border">
                                            @else
                                                <span class="text-gray-400 text-sm">
                                                    لا توجد صورة
                                                </span>
                                            @endif

                                        </td>

                                        <!-- اسم المهارة -->
                                        <td class="p-4">

                                            {{ $item->skill_name }}

                                        </td>

                                        <!-- الإجراءات -->
                                        <td class="p-4 flex gap-3">

                                            <!-- تعديل -->
                                            <a href="{{ route('skills.edit', ['page' => 'skills', 'id' => $item->id]) }}"
                                                class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-xl text-white text-sm">

                                                تعديل

                                            </a>

                                            <!-- حذف -->
                                            <form method="POST" action="{{ route('skills.delete', $item->id) }}"
                                                onsubmit="return confirm('هل أنت متأكد من حذف المهارة؟')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-xl text-white text-sm">

                                                    حذف

                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="3" class="p-6 text-center text-gray-400">

                                            لا توجد مهارات حالياً

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            @endif
      
            <!-- ================= CONTACT SETTINGS ================= -->
@if ($page == 'contact')

<div class="card">

    <h2 class="text-2xl font-bold mb-6">
        إعدادات التواصل الاجتماعي
    </h2>

    {{-- رسالة نجاح --}}
    @if(session('success'))
        <div class="bg-green-600 text-white p-4 rounded-xl mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- ================= FORM ================= --}}
    <form method="POST" action="{{ route('social.store') }}" class="space-y-4">
    @csrf

    <form method="POST" action="{{ route('social.store') }}" class="space-y-4">

    @csrf

    {{-- اسم المنصة --}}
    <input
        type="text"
        name="name"
        placeholder="اسم المنصة (TikTok, Facebook...)"
        class="w-full p-2 border rounded-xl"
        required
    >

    {{-- الرابط أو الرقم --}}
    <input
        type="text"
        name="url"
        placeholder="الرابط أو رقم واتساب"
        class="w-full p-2 border rounded-xl"
        required
    >

    {{-- الأيقونة --}}
    <input
        type="text"
        name="icon"
        placeholder="ri-facebook-fill"
        class="w-full p-2 border rounded-xl"
    >

    {{-- زر الإضافة --}}
    <button class="bg-emerald-600 text-white px-4 py-2 rounded-xl hover:bg-emerald-700 transition">
        إضافة منصة
    </button>

</form>

    {{-- ================= TABLE ================= --}}
<div class="mt-10 overflow-x-auto">

    <table class="w-full text-right border-collapse">

        <thead>
            <tr class="border-b border-gray-700">
                <th class="p-4">الأيقونة</th>
                <th class="p-4">المنصة</th>
                <th class="p-4">الرابط</th>
                <th class="p-4">الحالة</th>
                <th class="p-4">إجراءات</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($socialLinks as $link)

                <tr class="border-b border-gray-800">

                    {{-- ICON --}}
                    <td class="p-4 text-xl">
                        <i class="{{ $link->icon }}"></i>
                    </td>

                    {{-- NAME --}}
                    <td class="p-4 font-bold">
                        {{ $link->name }}
                    </td>

                    {{-- URL --}}
<td class="p-4 text-blue-400 break-all">

    @php
        $isWhatsApp = $link->name === 'WhatsApp';

        $finalUrl = $isWhatsApp
            ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $link->url)
            : $link->url;
    @endphp

    <a href="{{ $finalUrl }}" target="_blank">
        {{ $isWhatsApp ? 'wa.me/' . preg_replace('/[^0-9]/', '', $link->url) : $link->url }}
    </a>

</td>

                    {{-- STATUS --}}
                    <td class="p-4">

                        @if(!empty($link->url))
                            <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-xl text-sm">
                                متصل
                            </span>
                        @else
                            <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-xl text-sm">
                                فارغ
                            </span>
                        @endif

                    </td>

                    {{-- ACTIONS --}}
                    <td class="p-4 flex gap-2">

                        {{-- DELETE --}}
                        <form method="POST" action="{{ route('social.delete', $link->id) }}">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg">
                                حذف
                            </button>
                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" class="p-6 text-center text-gray-400">
                        لا توجد روابط تواصل حالياً
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>
    </div>

</div>

@endif

<!-- ================= MESSAGES ================= -->

            @if ($page == 'messages')
                <div class="card">
                    <h2 class="text-2xl font-bold mb-6">الرسائل</h2>

                    <table class="w-full text-right">
                        <tr class="border-b border-gray-700">
                            <td class="py-4">أحمد محمد</td>
                            <td>طلب تصميم موقع</td>
                            <td>جديد</td>
                        </tr>
                        <tr class="border-b border-gray-700">
                            <td class="py-4">شركة النور</td>
                            <td>عرض سعر</td>
                            <td>تم الرد</td>
                        </tr>
                    </table>
                </div>
            @endif

        </main>
    </div>

    <style>
        .nav-btn {
            display: block;
            width: 100%;
            text-align: right;
            padding: 12px 16px;
            border-radius: 14px;
            background: #111827;
            border: 1px solid #1f2937;
            color: #e5e7eb;
            transition: .2s;
        }

        .nav-btn:hover {
            background: #1f2937;
        }

        .card {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 20px;
            padding: 24px;
        }

        input,
        textarea {
            width: 100%;
            background: #1f2937;
            border: 1px solid #374151;
            color: white;
            border-radius: 12px;
            padding: 12px;
            outline: none;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #d1d5db;
        }
    </style>

</body>

</html>
