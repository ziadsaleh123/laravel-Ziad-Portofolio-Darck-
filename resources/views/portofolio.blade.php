<!DOCTYPE html>
<html lang="ar" dir="rtl" class="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <!-- 🔥 Remix Icons -->
<link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">    <title>زياد صالح يسلم الحوري</title>

    <script src="https://cdn.tailwindcss.com"></script>

<script>
    tailwind.config = {
        darkMode: 'class'
    }
</script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background: linear-gradient(to bottom, #f8fafc, #f1f5f9, #e2e8f0);
        }

        html.dark body {
            background: linear-gradient(to bottom, #020908, #03110f, #041614);
        }

        .bg-grid {
            background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px);
            background-size: 36px 36px;
        }

        .card-hover {
            transition: 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-6px);
        }
        .fa-brands,
.fa-solid {
    font-family: "Font Awesome 6 Brands", "Font Awesome 6 Free" !important;
}
    </style>
</head>

<body class="min-h-screen relative overflow-x-hidden bg-white text-slate-900 dark:bg-[#020908] dark:text-white">

    <div
        class="fixed inset-0 -z-10 bg-[radial-gradient(circle_at_top,rgba(16,185,129,0.10),transparent_24%),radial-gradient(circle_at_bottom,rgba(59,130,246,0.08),transparent_22%)] dark:bg-[radial-gradient(circle_at_top,rgba(16,185,129,0.14),transparent_24%),radial-gradient(circle_at_bottom,rgba(59,130,246,0.12),transparent_22%)]">
    </div>
    <div class="fixed inset-0 -z-10 opacity-[0.04] dark:opacity-[0.07] bg-grid"></div>

    <header
        class="sticky top-0 z-50 border-b border-slate-200 bg-white/70 backdrop-blur-xl dark:border-white/10 dark:bg-black/40">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 lg:px-8">
            <a href="#home"
                class="rounded-2xl border border-emerald-400/20 bg-emerald-400/10 px-4 py-2 text-2xl font-black text-emerald-500 shadow-[0_0_30px_rgba(16,185,129,.18)]">
                ZIAD
            </a>

            <nav class="hidden items-center gap-7 lg:flex">
                <a href="#home"
                    class="text-sm font-bold text-slate-700 transition hover:text-emerald-500 dark:text-white/80 dark:hover:text-emerald-400">الرئيسية</a>
                <a href="#about"
                    class="text-sm font-bold text-slate-700 transition hover:text-emerald-500 dark:text-white/80 dark:hover:text-emerald-400">من
                    أنا</a>
                <a href="#services"
                    class="text-sm font-bold text-slate-700 transition hover:text-emerald-500 dark:text-white/80 dark:hover:text-emerald-400">الخدمات</a>
                <a href="#projects"
                    class="text-sm font-bold text-slate-700 transition hover:text-emerald-500 dark:text-white/80 dark:hover:text-emerald-400">المشاريع</a>
                <a href="#skills"
                    class="text-sm font-bold text-slate-700 transition hover:text-emerald-500 dark:text-white/80 dark:hover:text-emerald-400">المهارات</a>
                <a href="#contact"
                    class="text-sm font-bold text-slate-700 transition hover:text-emerald-500 dark:text-white/80 dark:hover:text-emerald-400">تواصل</a>
            </nav>

            <div class="flex items-center gap-3">
                <!-- <button
          id="themeToggle"
          class="rounded-2xl border border-slate-200 bg-white/80 px-4 py-2 text-sm font-bold text-slate-700 hover:bg-slate-100 dark:border-white/10 dark:bg-white/5 dark:text-white dark:hover:bg-white/10"
        >
          ☀️ / 🌙
        </button> -->

                <a href="#contact"
                    class="hidden rounded-2xl bg-emerald-400 px-5 py-2 text-black hover:bg-emerald-300 lg:inline-flex font-bold">
                    ابدأ مشروعك
                </a>

                <button id="menuBtn"
                    class="rounded-2xl border border-slate-200 bg-white/80 p-3 lg:hidden dark:border-white/10 dark:bg-white/5">
                    ☰
                </button>
            </div>
        </div>

        <div id="mobileMenu"
            class="hidden border-t border-slate-200 bg-white/90 dark:border-white/10 dark:bg-black/80 lg:hidden">
            <div class="mx-auto flex max-w-7xl flex-col px-4 py-3">
                <a href="#home"
                    class="rounded-xl px-3 py-3 font-bold text-slate-700 transition hover:bg-slate-100 hover:text-emerald-500 dark:text-white/85 dark:hover:bg-white/5 dark:hover:text-emerald-400">الرئيسية</a>
                <a href="#about"
                    class="rounded-xl px-3 py-3 font-bold text-slate-700 transition hover:bg-slate-100 hover:text-emerald-500 dark:text-white/85 dark:hover:bg-white/5 dark:hover:text-emerald-400">من
                    أنا</a>
                <a href="#services"
                    class="rounded-xl px-3 py-3 font-bold text-slate-700 transition hover:bg-slate-100 hover:text-emerald-500 dark:text-white/85 dark:hover:bg-white/5 dark:hover:text-emerald-400">الخدمات</a>
                <a href="#projects"
                    class="rounded-xl px-3 py-3 font-bold text-slate-700 transition hover:bg-slate-100 hover:text-emerald-500 dark:text-white/85 dark:hover:bg-white/5 dark:hover:text-emerald-400">المشاريع</a>
                <a href="#skills"
                    class="rounded-xl px-3 py-3 font-bold text-slate-700 transition hover:bg-slate-100 hover:text-emerald-500 dark:text-white/85 dark:hover:bg-white/5 dark:hover:text-emerald-400">المهارات</a>
                <a href="#contact"
                    class="rounded-xl px-3 py-3 font-bold text-slate-700 transition hover:bg-slate-100 hover:text-emerald-500 dark:text-white/85 dark:hover:bg-white/5 dark:hover:text-emerald-400">تواصل</a>
            </div>
        </div>
    </header>

    <main>
        {{-- الرئيسية --}}
        @if (!empty($home))
            <section id="home" class="mx-auto max-w-7xl px-4 py-12 lg:px-8 lg:py-24">
    <div class="grid items-center gap-12 lg:grid-cols-2">

        <!-- 🔹 العمود الأول (النص) -->
        <div>

            <!-- الشعار -->
            <h6 class="mb-4 text-3xl md:text-4xl xl:text-5xl font-extrabold text-emerald-400 tracking-wide hover:text-emerald-300 transition">
                {!! $home->logo !!}
            </h6>

            <!-- العنوان -->
            <h1 class="text-4xl font-black leading-tight text-slate-900 md:text-6xl xl:text-7xl dark:text-white">
                {!! $home->main_title !!}
            </h1>

            <!-- الوصف -->
            <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-600 dark:text-white/70">
                {{ $home->description }}
            </p>

           

<!-- 🔥 السوشيال -->
<div class="mt-6 flex flex-wrap items-center gap-4">

    <div class="flex gap-3">

        @forelse($socialLinks as $link)

            @php
    $isWhatsApp = strtolower($link->name) === 'whatsapp';

    $phone = trim($link->url);
    $phone = preg_replace('/\D+/', '', $phone);

    if (!str_starts_with($phone, '967')) {
        $phone = '967' . $phone;
    }

    $finalUrl = $isWhatsApp
        ? "https://wa.me/{$phone}"
        : $link->url;
@endphp

            <a href="{{ $finalUrl }}"
                target="_blank"
                title="{{ $link->name }}"
                class="flex h-14 w-14 items-center justify-center rounded-2xl border border-slate-200 bg-white/80 text-slate-700 transition hover:-translate-y-1 hover:border-emerald-400/30 hover:text-emerald-500 dark:border-white/10 dark:bg-white/5 dark:text-white/80 dark:hover:text-emerald-400">

                {{-- Icon من قاعدة البيانات --}}
                <i class="{{ $link->icon }} text-2xl"></i>

            </a>

        @empty

            <p class="text-sm text-gray-400">
                لا توجد روابط تواصل حالياً
            </p>

        @endforelse

    </div>

</div>
<!-- 📊 الإحصائيات -->
            <div class="mt-10 grid grid-cols-2 gap-4 md:grid-cols-4">
                  
                <div class="rounded-3xl border border-slate-200 bg-white/80 p-5 shadow-sm dark:border-white/10 dark:bg-white/5">
                    <h1>سنوات الخبرة</h1>
                    <div class="text-3xl font-black text-emerald-500 dark:text-emerald-400">
                        
                        {{ $home->experience_years }}
                    </div>
                    <div class="mt-1 text-sm text-slate-500 dark:text-white/65">
                        {{ $home->experience_label }}
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white/80 p-5 shadow-sm dark:border-white/10 dark:bg-white/5">
                    <h1>عدد المشاريع</h1>
                    <div class="text-3xl font-black text-emerald-500 dark:text-emerald-400">
                        {{ $home->projects_count }}
                    </div>
                    <div class="mt-1 text-sm text-slate-500 dark:text-white/65">
                        {{ $home->projects_label }}
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white/80 p-5 shadow-sm dark:border-white/10 dark:bg-white/5">
                    <h1>عدد المهارات</h1>
                    <div class="text-3xl font-black text-emerald-500 dark:text-emerald-400">
                        {{ $home->skills_count }}
                    </div>
                    <div class="mt-1 text-sm text-slate-500 dark:text-white/65">
                        {{ $home->skills_label }}
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white/80 p-5 shadow-sm dark:border-white/10 dark:bg-white/5">
                    <h1>عملاء راضون</h1>
                    <div class="text-3xl font-black text-emerald-500 dark:text-emerald-400">
                        {{ $home->happy_clients }}
                    </div>
                    <div class="mt-1 text-sm text-slate-500 dark:text-white/65">
                        {{ $home->clients_label }}
                    </div>
                </div>

            </div>

        </div>

        <!-- 🖼️ العمود الثاني (الصورة) -->
        @if (!empty($home->main_image))
        <div class="relative">
            <div class="absolute -inset-6 rounded-[2.5rem] bg-emerald-400/15 blur-3xl"></div>

            <div class="relative rounded-[2rem] border border-slate-200 bg-white/80 p-4 shadow-[0_20px_60px_rgba(0,0,0,0.08)] dark:border-white/10 dark:bg-white/5">
                <div class="relative overflow-hidden rounded-[1.7rem] bg-gradient-to-b from-emerald-100 via-white to-slate-100 dark:from-emerald-500/10 dark:via-[#0b1513] dark:to-[#07100f]">

                    <img src="{{ asset('storage/' . $home->main_image) }}"
                        class="h-[520px] w-full object-cover object-top"
                        alt="{{ $home->main_title }}">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>

                </div>
            </div>
        </div>
        @endif

    </div>
</section>
        @endif
             {{-- من انا --}}
        <section id="about" class="mx-auto max-w-7xl px-4 py-6 lg:px-8 lg:py-10">

    <div class="mx-auto mb-10 max-w-3xl text-center">

        <!-- العنوان -->
        <h2 class="text-3xl font-black tracking-tight text-emerald-500 dark:text-emerald-400 md:text-5xl">
            {{ $about->section_title ?? 'من أنا' }}
        </h2>

        <div class="mx-auto mt-3 h-1 w-24 rounded-full bg-emerald-400/80"></div>

        <!-- الوصف -->
        <p class="mt-4 text-base leading-8 text-slate-500 dark:text-white/65 md:text-lg">
            {{-- {{ $about->section_description ?? '' }} --}}
        </p>
    </div>

    <div class="grid gap-6 lg:grid-cols-[1.15fr_.85fr]">

        <!-- المحتوى الرئيسي -->
        <div>
            <div class="rounded-[2rem] border border-slate-200 bg-white/80 dark:border-white/10 dark:bg-white/5">

                <div class="p-7 md:p-9">

                    <!-- الشارة -->
                    {{-- <div
                        class="mb-4 inline-flex rounded-full border border-emerald-400/25 bg-emerald-400/10 px-3 py-1 text-emerald-500 dark:text-emerald-400">
                        {{ $about->badge ?? 'Front-End Developer' }}
                    </div> --}}

                    <!-- العنوان الكبير -->
                    <h3 class="text-2xl font-black leading-relaxed md:text-3xl">
                        {{ $about->main_title ?? 'أبني تجارب رقمية تجمع بين الجمال، التنظيم، وسرعة التصفح' }}
                    </h3>

                    <!-- الفقرة الأولى -->
                    <p class="mt-5 text-base leading-9 text-slate-600 dark:text-white/72 md:text-lg">
                        {{ $about->paragraph_one ?? '' }}
                    </p>

                    <!-- الفقرة الثانية -->
                    <p class="mt-4 text-base leading-9 text-slate-600 dark:text-white/72 md:text-lg">
                        {{ $about->paragraph_two ?? '' }}
                    </p>

                </div>
            </div>
        </div>

        <!-- البطاقات -->
        <div class="grid gap-4 sm:grid-cols-2">

            <!-- الاسم -->
            <div
                class="rounded-[1.7rem] border border-slate-200 bg-white/80 p-5 dark:border-white/10 dark:bg-white/5">

                <div
                    class="mb-3 flex h-11 w-11 items-center justify-center rounded-2xl bg-emerald-400/10 text-emerald-500 dark:text-emerald-400">
                    👤
                </div>

                <div class="text-sm font-bold text-emerald-500 dark:text-emerald-400">
                    الاسم
                </div>

                <div class="mt-2 text-lg font-extrabold">
                    {{ $about->name ?? 'زياد صالح الهوري' }}
                </div>
            </div>

            <!-- التخصص -->
            <div
                class="rounded-[1.7rem] border border-slate-200 bg-white/80 p-5 dark:border-white/10 dark:bg-white/5">

                <div
                    class="mb-3 flex h-11 w-11 items-center justify-center rounded-2xl bg-emerald-400/10 text-emerald-500 dark:text-emerald-400">
                    💻
                </div>

                <div class="text-sm font-bold text-emerald-500 dark:text-emerald-400">
                    التخصص
                </div>

                <div class="mt-2 text-lg font-extrabold">
                    {{ $about->specialty ?? 'Front-End Developer' }}
                </div>
            </div>

            <!-- التركيز -->
            <div
                class="rounded-[1.7rem] border border-slate-200 bg-white/80 p-5 dark:border-white/10 dark:bg-white/5">

                <div
                    class="mb-3 flex h-11 w-11 items-center justify-center rounded-2xl bg-emerald-400/10 text-emerald-500 dark:text-emerald-400">
                    📁
                </div>

                <div class="text-sm font-bold text-emerald-500 dark:text-emerald-400">
                    التركيز
                </div>

                <div class="mt-2 text-lg font-extrabold">
                    {{ $about->focus ?? 'UI / UX + الأداء' }}
                </div>
            </div>

            <!-- الهدف -->
            <div
                class="rounded-[1.7rem] border border-slate-200 bg-white/80 p-5 dark:border-white/10 dark:bg-white/5">

                <div
                    class="mb-3 flex h-11 w-11 items-center justify-center rounded-2xl bg-emerald-400/10 text-emerald-500 dark:text-emerald-400">
                    ⭐
                </div>

                <div class="text-sm font-bold text-emerald-500 dark:text-emerald-400">
                    الهدف
                </div>

                <div class="mt-2 text-lg font-extrabold">
                    {{ $about->goal ?? 'مواقع تترك انطباعًا قويًا' }}
                </div>
            </div>

        </div>
    </div>
</section>

               {{-- ----------------- الخدمات -------------------}}

               
        <section id="services" class="mx-auto max-w-7xl px-4 py-6 lg:px-8 lg:py-10">

    <div class="mx-auto mb-10 max-w-3xl text-center">
        <h2 class="text-3xl font-black tracking-tight text-emerald-500 dark:text-emerald-400 md:text-5xl">
            الخدمات
        </h2>

        <div class="mx-auto mt-3 h-1 w-24 rounded-full bg-emerald-400/80"></div>
    </div>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">

        @forelse($services as $service)

            <div class="overflow-hidden rounded-[1.8rem] border border-slate-200 bg-white/80 shadow-sm transition hover:shadow-lg dark:border-white/10 dark:bg-white/5">

                <!-- ===== الصورة (تأخذ عرض الكارد) ===== -->
                <div class="h-44 w-full overflow-hidden">

                    @if($service->service_image)
                        <img src="{{ asset('storage/'.$service->service_image) }}"
                             class="h-full w-full object-cover transition duration-300 hover:scale-105">
                    @else
                        <div class="flex h-full w-full items-center justify-center bg-slate-200 text-slate-500 dark:bg-white/10">
                            لا توجد صورة
                        </div>
                    @endif

                </div>

                <!-- ===== المحتوى ===== -->
                <div class="p-6">

                    <h3 class="text-xl font-black">
                        {{ $service->service_title }}
                    </h3>

                    <p class="mt-3 leading-7 text-slate-600 dark:text-white/70">
                        {{ $service->service_description }}
                    </p>

                    {{-- @if(!empty($service->service_status))
                        <span class="mt-4 inline-block rounded-full bg-emerald-100 px-3 py-1 text-xs text-emerald-600 dark:bg-emerald-400/10 dark:text-emerald-400">
                            {{ $service->service_status }}
                        </span>
                    @endif --}}

                </div>

            </div>

        @empty

            <div class="col-span-4 text-center text-slate-500 dark:text-white/60">
                لا توجد خدمات حالياً
            </div>

        @endforelse

    </div>

</section>

              {{-------------------- المشاريع --------------------}}
<section id="projects" class="mx-auto max-w-7xl px-4 py-6 lg:px-8 lg:py-10">

    <!-- العنوان -->
    <div class="mx-auto mb-10 max-w-3xl text-center">
        <h2 class="text-3xl font-black tracking-tight text-emerald-500 dark:text-emerald-400 md:text-5xl">
            المشاريع
        </h2>

        <div class="mx-auto mt-3 h-1 w-24 rounded-full bg-emerald-400/80"></div>

       
    </div>

    

    <!-- المشاريع -->
    <div id="projectsContainer" class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">

        @forelse($projects as $item)

        <div class="project-card group rounded-3xl border bg-white dark:bg-white/5 overflow-hidden transition hover:-translate-y-1"
             data-category="{{ $item->category ?? 'frontend' }}">

            <!-- الصورة -->
            <div class="h-48 overflow-hidden">

                @if(!empty($item->project_image))
                    <img src="{{ asset('storage/' . $item->project_image) }}"
                         class="h-full w-full object-cover transition group-hover:scale-105">
                @else
                    <div class="flex h-full items-center justify-center text-slate-400">
                        لا توجد صورة
                    </div>
                @endif

            </div>

            <!-- المحتوى -->
            <div class="p-5">

                <h3 class="text-lg font-bold text-slate-800 dark:text-white">
                    {{ $item->project_name }}
                </h3>

                <a href="{{ $item->project_link }}"
   target="_blank"
   class="mt-4 inline-flex items-center gap-2 rounded-xl border border-emerald-500 px-4 py-2 text-sm font-bold text-emerald-500 transition hover:bg-emerald-500 hover:text-white">

    عرض المشروع
</a>

            </div>

        </div>

        @empty
            <div class="col-span-full text-center text-slate-500">لا توجد مشاريع</div>
        @endforelse

    </div>
</section>


      {{------------- المهارات -------------}}
       <section id="skills" class="mx-auto max-w-7xl px-4 py-6 lg:px-8 lg:py-10">

    <div class="mx-auto mb-10 max-w-3xl text-center">

        <h2 class="text-3xl font-black tracking-tight text-emerald-500 dark:text-emerald-400 md:text-5xl">
            المهارات
        </h2>

        <div class="mx-auto mt-3 h-1 w-24 rounded-full bg-emerald-400/80"></div>

        <p class="mt-4 text-base leading-8 text-slate-500 dark:text-white/65 md:text-lg">
            مجموعة المهارات التي أستخدمها في بناء واجهات مرنة، متجاوبة، وقابلة للتطوير بجودة أعلى من القوالب العادية.
        </p>

    </div>

    <!-- ================= SKILLS FROM DATABASE ================= -->
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

        @forelse ($skills as $skill)

            <div class="rounded-2xl border border-white/10 bg-white/5 p-6 text-center shadow-sm">

                <!-- الصورة -->
                @if ($skill->skill_image)
                    <img src="{{ asset('storage/' . $skill->skill_image) }}"
                         class="mx-auto mb-4 h-16 w-16 rounded-xl object-cover">
                @else
                    <div class="mx-auto mb-4 h-16 w-16 rounded-xl bg-gray-700"></div>
                @endif

                <!-- الاسم -->
                <h3 class="text-lg font-bold text-white">
                    {{ $skill->skill_name }}
                </h3>

            </div>

        @empty

            <div class="col-span-full text-center text-gray-400">
                لا توجد مهارات حالياً
            </div>

        @endforelse

    </div>

</section>


        </section>

        <section id="contact" class="mx-auto max-w-7xl px-4 py-12 lg:px-8">

    <!-- العنوان -->
    <div class="mb-10 text-center">
        <h2 class="text-3xl font-black text-emerald-500 md:text-5xl">تواصل معي</h2>
        <p class="mt-3 text-slate-500 dark:text-white/60">
            اكتب تفاصيل مشروعك وسأرد عليك بأسرع وقت
        </p>
    </div>

    <!-- الفورم -->
    <div class="mx-auto max-w-5xl">
        <div class="rounded-[2rem] border border-slate-200 bg-white/80 p-8 shadow-sm dark:border-white/10 dark:bg-white/5">

            <form id="contactForm" class="grid gap-5 md:grid-cols-2">

                <!-- إعدادات FormSubmit -->
                <input type="hidden" name="_captcha" value="false">
                <input type="hidden" name="_subject" value="رسالة جديدة من الموقع">
                <input type="hidden" name="_template" value="table">

                <!-- الحقول -->
                <input name="name" required
                    class="h-14 rounded-2xl border border-slate-200 bg-white px-5 outline-none focus:border-emerald-400 dark:border-white/10 dark:bg-white/5"
                    placeholder="الاسم الكامل" />

                <input name="whatsapp"
                    class="h-14 rounded-2xl border border-slate-200 bg-white px-5 outline-none focus:border-emerald-400 dark:border-white/10 dark:bg-white/5"
                    placeholder="رقم الواتس اب" />

                <input name="email" required
                    class="h-14 rounded-2xl border border-slate-200 bg-white px-5 outline-none md:col-span-2 focus:border-emerald-400 dark:border-white/10 dark:bg-white/5"
                    placeholder="البريد الإلكتروني" />

                <input name="subject"
                    class="h-14 rounded-2xl border border-slate-200 bg-white px-5 outline-none md:col-span-2 focus:border-emerald-400 dark:border-white/10 dark:bg-white/5"
                    placeholder="عنوان الرسالة" />

                <textarea name="message" required
                    class="min-h-[200px] rounded-2xl border border-slate-200 bg-white p-5 outline-none md:col-span-2 focus:border-emerald-400 dark:border-white/10 dark:bg-white/5"
                    placeholder="اكتب تفاصيل مشروعك أو الرسالة هنا..."></textarea>

                <!-- زر الإرسال -->
                <button id="submitBtn"
                    class="h-14 rounded-2xl bg-emerald-400 text-black font-bold transition hover:bg-emerald-300 md:col-span-2">
                    إرسال الرسالة
                </button>

                <!-- رسالة النجاح -->
                <p id="successMsg"
                   class="hidden text-green-500 text-center md:col-span-2 font-bold">
                    ✅ تم إرسال الرسالة بنجاح
                </p>

            </form>

        </div>
    </div>

</section>

<script>
document.getElementById("contactForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const form = e.target;
    const btn = document.getElementById("submitBtn");
    const msg = document.getElementById("successMsg");

    btn.innerText = "جاري الإرسال...";
    btn.disabled = true;

    fetch("https://formsubmit.co/ziad10719999@gmail.com", {
        method: "POST",
        body: new FormData(form)
    })
    .then(() => {
    form.reset();
    msg.classList.remove("hidden");
    msg.innerText = "✅ تم إرسال الرسالة بنجاح، سوف يتم التواصل معك عبر البريد الإلكتروني أو الواتس اب";
    btn.innerText = "تم الإرسال ✔";
})
    .catch(() => {
        alert("حدث خطأ أثناء الإرسال");
        btn.innerText = "إرسال الرسالة";
        btn.disabled = false;
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const buttons = document.querySelectorAll(".filter-btn");
    const cards = document.querySelectorAll(".project-card");

    buttons.forEach(btn => {

        btn.addEventListener("click", function () {

            // إزالة active من كل الأزرار
            buttons.forEach(b => {
                b.classList.remove("bg-emerald-500", "text-white");
                b.classList.add("border");
            });

            // تفعيل الزر الحالي
            this.classList.add("bg-emerald-500", "text-white");
            this.classList.remove("border");

            const filter = this.getAttribute("data-filter");

            cards.forEach(card => {

                const category = card.getAttribute("data-category");

                if (filter === "all" || filter === category) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }

            });

        });

    });

});
</script>
    </main>

    

</html>
