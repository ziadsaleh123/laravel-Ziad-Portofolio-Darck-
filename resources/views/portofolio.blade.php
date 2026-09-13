<!DOCTYPE html>
<html lang="ar" dir="rtl" class="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
    <title>زياد صالح يسلم الحوري | مطور واجهات مستخدم ومواقع ويب</title>

    <!-- 🌐 Google Fonts: Readex Pro (Arabic) + Plus Jakarta Sans (Latin / Numbers) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Readex+Pro:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- 🎨 Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

    <!-- ⚡ Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Readex Pro"', '"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        m3: {
                            'surface': '#090d16',
                            'surface-dim': '#060910',
                            'surface-low': '#0e1422',
                            'surface-card': '#121a2c',
                            'surface-high': '#18233c',
                            'surface-highest': '#202d4a',
                            'primary': '#3b82f6',
                            'primary-light': '#60a5fa',
                            'primary-container': 'rgba(59, 130, 246, 0.14)',
                            'on-primary-container': '#93c5fd',
                            'outline': 'rgba(255, 255, 255, 0.08)',
                            'outline-variant': 'rgba(59, 130, 246, 0.22)',
                        }
                    },
                    borderRadius: {
                        '3xl': '1.75rem',
                        '4xl': '2.25rem',
                    }
                }
            }
        }
    </script>

    <style>
        /* 🔒 حظر التمرير الأفقي نهائياً وضبط معايير النسبة الذهبية */
        *, *::before, *::after {
            box-sizing: border-box;
        }

        html, body {
            max-width: 100vw;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
            font-family: "Readex Pro", "Plus Jakarta Sans", system-ui, sans-serif;
            background-color: #090d16;
            color: #f1f5f9;
        }

        /* شبكة خلفية دقيقة بنمط Material */
        .m3-grid-pattern {
            background-image: radial-gradient(rgba(59, 130, 246, 0.12) 1px, transparent 1px);
            background-size: 34px 34px; /* 34px من متتالية فيبوناتشي */
        }

        /* تأثيرات النقر والانتقال بأسلوب Material */
        .m3-state-layer {
            transition: all 0.25s cubic-bezier(0.2, 0.0, 0, 1.0);
        }

        .m3-card-hover {
            transition: transform 0.3s cubic-bezier(0.2, 0, 0, 1), box-shadow 0.3s cubic-bezier(0.2, 0, 0, 1), border-color 0.3s ease;
        }

        .m3-card-hover:hover {
            transform: translateY(-4px);
        }

        /* إخفاء شريط التمرير الأفقي مع الحفاظ على الوظيفة */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="min-h-screen relative w-full overflow-x-hidden bg-[#090d16] text-slate-100 antialiased selection:bg-blue-500/30 selection:text-blue-300">

    <!-- 🌌 إضاءات الخلفية بنمط Material You Tonal Atmosphere -->
    <div class="fixed inset-0 -z-10 pointer-events-none overflow-hidden max-w-[100vw]">
        <div class="absolute top-[-10%] right-1/2 translate-x-1/2 w-[34rem] h-[34rem] rounded-full bg-blue-600/10 blur-[130px]"></div>
        <div class="absolute top-[40%] -left-20 w-[28rem] h-[28rem] rounded-full bg-indigo-600/8 blur-[140px]"></div>
        <div class="absolute bottom-[-10%] right-[-5%] w-[32rem] h-[32rem] rounded-full bg-blue-500/10 blur-[150px]"></div>
        <div class="absolute inset-0 opacity-[0.035] m3-grid-pattern"></div>
    </div>

    <!-- 📱 زر عائم FAB للتواصل السريع عبر واتساب (يظهر حصرياً على الهواتف والأجهزة اللوحية) -->
    <a href="https://wa.me/967779118281" target="_blank"
        class="fixed bottom-5 left-5 z-40 lg:hidden flex items-center gap-2 rounded-full bg-green-600 text-white px-4 py-3 shadow-2xl shadow-green-500/30 font-bold active:scale-95 m3-state-layer border border-green-400/30">
        <i class="ri-whatsapp-line text-xl"></i>
        <span class="text-xs font-semibold">محادثة فورية</span>
    </a>

    <!-- 🌟 شريط التنقل العلوي M3 Top App Bar (ثابت عند التمرير) -->
    <header class="fixed top-0 inset-x-0 z-50 border-b border-white/10 bg-[#090d16]/90 backdrop-blur-xl transition-all shadow-lg shadow-black/20">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8">
            
            <!-- الشعار بنمط M3 Pill Badge -->
            <a href="#home" class="flex items-center gap-2.5 group">
                <span class="flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-500/15 border border-blue-500/30 text-blue-400 font-extrabold text-lg transition group-hover:scale-105 group-hover:bg-blue-500 group-hover:text-white">
                    Z
                </span>
                <span class="text-xl font-black tracking-wider text-white">
                    ZIAD<span class="text-blue-500">.</span>
                </span>
            </a>

            <!-- روابط التنقل (ديسكتوب) بنمط M3 Navigation Pills -->
            <nav class="hidden lg:flex items-center gap-1.5 p-1.5 rounded-full border border-white/10 bg-white/5">
                <a href="#home" class="rounded-full px-4 py-1.5 text-xs font-semibold text-slate-300 transition hover:text-white hover:bg-white/10">الرئيسية</a>
                <a href="#about" class="rounded-full px-4 py-1.5 text-xs font-semibold text-slate-300 transition hover:text-white hover:bg-white/10">من أنا</a>
                <a href="#services" class="rounded-full px-4 py-1.5 text-xs font-semibold text-slate-300 transition hover:text-white hover:bg-white/10">الخدمات</a>
                <a href="#projects" class="rounded-full px-4 py-1.5 text-xs font-semibold text-slate-300 transition hover:text-white hover:bg-white/10">المشاريع</a>
                <a href="#skills" class="rounded-full px-4 py-1.5 text-xs font-semibold text-slate-300 transition hover:text-white hover:bg-white/10">المهارات</a>
                <a href="#contact" class="rounded-full px-4 py-1.5 text-xs font-semibold text-slate-300 transition hover:text-white hover:bg-white/10">تواصل</a>
            </nav>

            <!-- أزرار الإجراءات في الرأس -->
            <div class="flex items-center gap-2.5">
                <!-- زر بدء المشروع (M3 Filled Pill Button) -->
                <a href="#contact"
                    class="hidden sm:inline-flex items-center gap-2 rounded-full bg-blue-600 px-5 py-2.5 text-xs font-bold text-white shadow-lg shadow-blue-500/20 transition hover:bg-blue-500 hover:shadow-blue-500/30 active:scale-95">
                    <span>ابدأ مشروعك</span>
                    <i class="ri-arrow-left-line"></i>
                </a>

                <!-- زر القائمة للجوال (M3 Icon Button) -->
                <button id="menuBtn" aria-label="القائمة"
                    class="flex h-11 w-11 items-center justify-center rounded-2xl border border-white/10 bg-white/5 text-slate-200 transition hover:bg-white/10 hover:text-white lg:hidden active:scale-90">
                    <i class="ri-menu-4-line text-xl" id="menuIcon"></i>
                </button>
            </div>
        </div>

        <!-- 📱 القائمة المنسدلة للهواتف M3 Mobile Drawer -->
        <div id="mobileMenu"
            class="hidden border-t border-white/10 bg-[#0c121e]/98 backdrop-blur-2xl lg:hidden transition-all duration-300 max-h-[calc(100vh-4.5rem)] overflow-y-auto no-scrollbar">
            <div class="mx-auto flex flex-col p-4 space-y-1.5 max-w-md">
                <a href="#home" class="mobile-nav-link flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-200 hover:bg-blue-500/15 hover:text-blue-400 transition">
                    <i class="ri-home-5-line text-lg text-blue-400"></i>
                    <span>الرئيسية</span>
                </a>
                <a href="#about" class="mobile-nav-link flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-200 hover:bg-blue-500/15 hover:text-blue-400 transition">
                    <i class="ri-user-smile-line text-lg text-blue-400"></i>
                    <span>من أنا</span>
                </a>
                <a href="#services" class="mobile-nav-link flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-200 hover:bg-blue-500/15 hover:text-blue-400 transition">
                    <i class="ri-service-line text-lg text-blue-400"></i>
                    <span>الخدمات</span>
                </a>
                <a href="#projects" class="mobile-nav-link flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-200 hover:bg-blue-500/15 hover:text-blue-400 transition">
                    <i class="ri-macbook-line text-lg text-blue-400"></i>
                    <span>المشاريع</span>
                </a>
                <a href="#skills" class="mobile-nav-link flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-200 hover:bg-blue-500/15 hover:text-blue-400 transition">
                    <i class="ri-code-s-slash-line text-lg text-blue-400"></i>
                    <span>المهارات</span>
                </a>
                <a href="#contact" class="mobile-nav-link flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-slate-200 hover:bg-blue-500/15 hover:text-blue-400 transition">
                    <i class="ri-chat-3-line text-lg text-blue-400"></i>
                    <span>تواصل معي</span>
                </a>

                <div class="pt-3 border-t border-white/10 mt-2">
                    <a href="#contact" class="mobile-nav-link flex items-center justify-center gap-2 rounded-full bg-blue-600 py-3 text-sm font-bold text-white shadow-lg shadow-blue-500/20">
                        <span>ابدأ مشروعك الآن</span>
                        <i class="ri-arrow-left-line"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="w-full max-w-full overflow-x-hidden pt-16 sm:pt-20">

        <!-- ================= 1. قسم البطل HERO (النسبة الذهبية + Mobile-First) ================= -->
        @if (!empty($home))
            <section id="home" class="relative mx-auto max-w-7xl px-4 py-8 sm:px-6 sm:py-12 md:py-16 lg:px-8 lg:py-24">
                <div class="grid grid-cols-1 items-center gap-8 lg:grid-cols-12 lg:gap-12">

                    <!-- العمود الأول (النص والإحصائيات): 61.8% على الشاشات الكبيرة -->
                    <div class="lg:col-span-7 space-y-6">

                        <!-- الشعار الصغير / الوصف المقتضب -->
                        <!-- <div class="inline-flex items-center gap-2.5 rounded-full border border-blue-500/20 bg-blue-500/10 px-4 py-1.5 text-xs font-bold text-blue-400">
                            <span class="flex h-2 w-2 rounded-full bg-blue-500 animate-pulse"></span>
                            <span>{!! $home->logo !!}</span>
                        </div> -->

                        <!-- العنوان الرئيسي (وفق السلم الذهبي للخطوط) -->
                       <h1 class="text-2xl font-black leading-[1.2] text-white sm:text-3xl md:text-4xl lg:text-5xl tracking-tight">
    {!! $home->main_title !!}
</h1>

                        <!-- الوصف التعريفي -->
                        <p class="max-w-2xl text-sm leading-relaxed text-slate-400 sm:text-base md:text-lg">
                            {{ $home->description }}
                        </p>

                        <!-- أزرار الإجراءات السريعة وشبكات التواصل -->
                        <div class="flex flex-wrap items-center gap-4 pt-2">
                            <a href="#contact"
                                class="flex items-center gap-2 rounded-full bg-blue-600 px-6 py-3.5 text-sm font-bold text-white shadow-xl shadow-blue-500/25 transition duration-300 hover:bg-blue-500 hover:-translate-y-0.5 active:scale-95">
                                <span>تواصل معي مباشرة</span>
                                <i class="ri-chat-voice-line text-base"></i>
                            </a>

                            <a href="#projects"
                                class="flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-6 py-3.5 text-sm font-bold text-slate-200 transition duration-300 hover:bg-white/10 hover:text-white hover:-translate-y-0.5 active:scale-95">
                                <span>تصفح المشاريع</span>
                                <i class="ri-arrow-down-line text-base"></i>
                            </a>
                        </div>

                        <!-- 📊 شريط الإحصائيات (M3 Cards مرتبة بنسب ذهبية 2 للموبايل و 4 للكمبيوتر) -->
                        <div class="pt-4 grid grid-cols-2 gap-3 sm:gap-4 md:grid-cols-4">
                            
                            <!-- سنوات الخبرة -->
                            <div class="rounded-3xl border border-white/10 bg-[#121a2c]/80 p-4 sm:p-5 m3-card-hover backdrop-blur-sm">
                                <span class="text-[11px] font-bold text-slate-400 block mb-1">سنوات الخبرة</span>
                                <div class="text-2xl sm:text-3xl font-black text-blue-400">
                                    {{ $home->experience_years }}+
                                </div>
                                <span class="text-[11px] text-slate-500 mt-0.5 block">{{ $home->experience_label ?? 'في تطوير الويب' }}</span>
                            </div>

                            <!-- عدد المشاريع -->
                            <div class="rounded-3xl border border-white/10 bg-[#121a2c]/80 p-4 sm:p-5 m3-card-hover backdrop-blur-sm">
                                <span class="text-[11px] font-bold text-slate-400 block mb-1">المشاريع المنجزة</span>
                                <div class="text-2xl sm:text-3xl font-black text-blue-400">
                                    {{ $home->projects_count }}+
                                </div>
                                <span class="text-[11px] text-slate-500 mt-0.5 block">{{ $home->projects_label ?? 'مشروع احترافي' }}</span>
                            </div>

                            <!-- المهارات -->
                            <div class="rounded-3xl border border-white/10 bg-[#121a2c]/80 p-4 sm:p-5 m3-card-hover backdrop-blur-sm">
                                <span class="text-[11px] font-bold text-slate-400 block mb-1">المهارات والتقنيات</span>
                                <div class="text-2xl sm:text-3xl font-black text-blue-400">
                                    {{ $home->skills_count }}+
                                </div>
                                <span class="text-[11px] text-slate-500 mt-0.5 block">{{ $home->skills_label ?? 'تقنية حديثة' }}</span>
                            </div>

                            <!-- العملاء -->
                            <div class="rounded-3xl border border-white/10 bg-[#121a2c]/80 p-4 sm:p-5 m3-card-hover backdrop-blur-sm">
                                <span class="text-[11px] font-bold text-slate-400 block mb-1">العملاء والشركاء</span>
                                <div class="text-2xl sm:text-3xl font-black text-blue-400">
                                    {{ $home->happy_clients }}+
                                </div>
                                <span class="text-[11px] text-slate-500 mt-0.5 block">{{ $home->clients_label ?? 'عميل راضٍ' }}</span>
                            </div>

                        </div>

                    </div>

                    <!-- العمود الثاني (الصورة الشخصية): 38.2% بنسبة النسبة الذهبية -->
                    @if (!empty($home->main_image))
                        <div class="lg:col-span-5 flex justify-center mt-4 lg:mt-0">
                            <div class="relative w-full max-w-sm sm:max-w-md lg:max-w-full">
                                
                                <!-- إشعاع خلفي هادئ -->
                                <div class="absolute -inset-4 rounded-[3rem] bg-blue-500/15 blur-2xl"></div>

                                <!-- بطاقة الصورة M3 Surface -->
                                <div class="relative overflow-hidden rounded-[2.5rem] border border-white/15 bg-[#121a2c]/90 p-3 shadow-2xl backdrop-blur-md">
                                    <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-b from-blue-500/10 via-[#0e1422] to-[#070a12] aspect-[1/1.15] sm:aspect-[1/1.2]">
                                        <img src="{{ asset('storage/' . $home->main_image) }}"
                                            class="h-full w-full object-cover object-top transition duration-500 hover:scale-105"
                                            alt="{{ $home->main_title }}">
                                        <div class="absolute inset-0 bg-gradient-to-t from-[#090d16] via-transparent to-transparent opacity-60"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif

                </div>
            </section>
        @endif

        <!-- ================= 2. قسم من أنا ABOUT ================= -->
        @if (!empty($about))
            <section id="about" class="relative mx-auto max-w-7xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">
                
                <!-- رأس القسم بنمط M3 -->
                <div class="mx-auto mb-10 text-center max-w-2xl">
                    <span class="inline-flex items-center gap-1.5 rounded-full border border-blue-500/20 bg-blue-500/10 px-3.5 py-1 text-xs font-bold text-blue-400 mb-2.5">
                        نبذة تعريفية
                    </span>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-white">
                        {{ $about->section_title ?? 'من أنا' }}
                    </h2>
                    <div class="mx-auto mt-3 h-1 w-16 rounded-full bg-blue-500"></div>
                </div>

                <!-- شبكة القسم بنسبة ذهبية (القصة 61.8% والبطاقات 38.2%) -->
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-12 items-start">
                    
                    <!-- القصة والشرح -->
                    <div class="lg:col-span-7">
                        <div class="rounded-3xl border border-white/10 bg-[#121a2c]/80 p-6 sm:p-8 md:p-9 shadow-sm backdrop-blur-sm">
                            <h3 class="text-xl sm:text-2xl font-black leading-snug text-white mb-4">
                                {{ $about->main_title ?? 'أبني تجارب رقمية تجمع بين الجمال، التنظيم، وسرعة التصفح' }}
                            </h3>
                            <p class="text-sm sm:text-base leading-relaxed text-slate-300 mb-4">
                                {{ $about->paragraph_one ?? '' }}
                            </p>
                            <p class="text-sm sm:text-base leading-relaxed text-slate-400">
                                {{ $about->paragraph_two ?? '' }}
                            </p>
                        </div>
                    </div>

                    <!-- البطاقات التعريفية M3 Tonal Feature Cards -->
                    <div class="lg:col-span-5 grid grid-cols-1 sm:grid-cols-2 gap-3.5 sm:gap-4">

                        <!-- الاسم -->
                        <div class="rounded-3xl border border-white/10 bg-[#121a2c]/80 p-5 m3-card-hover backdrop-blur-sm">
                            <div class="mb-3 flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-500/15 text-blue-400 text-xl">
                                <i class="ri-user-smile-line"></i>
                            </div>
                            <span class="text-xs font-bold text-blue-400 block">الاسم</span>
                            <h4 class="mt-1 text-base font-extrabold text-white">
                                {{ $about->name ?? 'زياد صالح الهوري' }}
                            </h4>
                        </div>

                        <!-- التخصص -->
                        <div class="rounded-3xl border border-white/10 bg-[#121a2c]/80 p-5 m3-card-hover backdrop-blur-sm">
                            <div class="mb-3 flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-500/15 text-indigo-400 text-xl">
                                <i class="ri-code-box-line"></i>
                            </div>
                            <span class="text-xs font-bold text-indigo-400 block">التخصص</span>
                            <h4 class="mt-1 text-base font-extrabold text-white">
                                {{ $about->specialty ?? 'Front-End Developer' }}
                            </h4>
                        </div>

                        <!-- التركيز -->
                        <div class="rounded-3xl border border-white/10 bg-[#121a2c]/80 p-5 m3-card-hover backdrop-blur-sm">
                            <div class="mb-3 flex h-11 w-11 items-center justify-center rounded-2xl bg-sky-500/15 text-sky-400 text-xl">
                                <i class="ri-focus-3-line"></i>
                            </div>
                            <span class="text-xs font-bold text-sky-400 block">مجال التركيز</span>
                            <h4 class="mt-1 text-base font-extrabold text-white">
                                {{ $about->focus ?? 'UI / UX + الأداء' }}
                            </h4>
                        </div>

                        <!-- الهدف -->
                        <div class="rounded-3xl border border-white/10 bg-[#121a2c]/80 p-5 m3-card-hover backdrop-blur-sm">
                            <div class="mb-3 flex h-11 w-11 items-center justify-center rounded-2xl bg-amber-500/15 text-amber-400 text-xl">
                                <i class="ri-star-line"></i>
                            </div>
                            <span class="text-xs font-bold text-amber-400 block">الهدف</span>
                            <h4 class="mt-1 text-base font-extrabold text-white">
                                {{ $about->goal ?? 'مواقع تترك انطباعًا قويًا' }}
                            </h4>
                        </div>

                    </div>

                </div>

            </section>
        @endif

        <!-- ================= 3. قسم الخدمات SERVICES ================= -->
        <section id="services" class="relative mx-auto max-w-7xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">
            
            <div class="mx-auto mb-10 text-center max-w-2xl">
                <span class="inline-flex items-center gap-1.5 rounded-full border border-blue-500/20 bg-blue-500/10 px-3.5 py-1 text-xs font-bold text-blue-400 mb-2.5">
                    ما أقدمه لك
                </span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-white">
                    الخدمات الاحترافية
                </h2>
                <div class="mx-auto mt-3 h-1 w-16 rounded-full bg-blue-500"></div>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @forelse($services as $service)
                    <div class="group overflow-hidden rounded-3xl border border-white/10 bg-[#121a2c]/80 m3-card-hover flex flex-col backdrop-blur-sm">
                        
                        <!-- صورة الخدمة بنسبة النسبة الذهبية -->
                        <div class="relative h-44 w-full overflow-hidden bg-white/5">
                            @if($service->service_image)
                                <img src="{{ asset('storage/' . $service->service_image) }}"
                                     class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                     alt="{{ $service->service_title }}">
                            @else
                                <div class="flex h-full w-full items-center justify-center text-slate-500">
                                    <i class="ri-image-line text-3xl"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-[#121a2c] via-transparent to-transparent opacity-80"></div>
                        </div>

                        <!-- تفاصيل الخدمة -->
                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-white group-hover:text-blue-400 transition">
                                    {{ $service->service_title }}
                                </h3>
                                <p class="mt-2 text-xs sm:text-sm leading-relaxed text-slate-400">
                                    {{ $service->service_description }}
                                </p>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full text-center py-10 text-slate-500">
                        لا توجد خدمات متاحة حالياً
                    </div>
                @endforelse
            </div>

        </section>

        <!-- ================= 4. قسم المشاريع PROJECTS ================= -->
        <section id="projects" class="relative mx-auto max-w-7xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">
            
            <div class="mx-auto mb-10 text-center max-w-2xl">
                <span class="inline-flex items-center gap-1.5 rounded-full border border-blue-500/20 bg-blue-500/10 px-3.5 py-1 text-xs font-bold text-blue-400 mb-2.5">
                    معرض الأعمال
                </span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-white">
                    أحدث المشاريع
                </h2>
                <div class="mx-auto mt-3 h-1 w-16 rounded-full bg-blue-500"></div>
            </div>

            <!-- شبكة كروت المشاريع (متجاوبة تماماً للموبايل والأيباد) -->
            <div id="projectsContainer" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse($projects as $item)
                    <div class="project-card group overflow-hidden rounded-3xl border border-white/10 bg-[#121a2c]/80 m3-card-hover flex flex-col backdrop-blur-sm"
                         data-category="{{ $item->category ?? 'frontend' }}">
                        
                        <!-- صورة المشروع -->
                        <div class="relative h-48 sm:h-52 w-full overflow-hidden bg-white/5">
                            @if(!empty($item->project_image))
                                <img src="{{ asset('storage/' . $item->project_image) }}"
                                     class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                     alt="{{ $item->project_name }}">
                            @else
                                <div class="flex h-full w-full items-center justify-center text-slate-500">
                                    <i class="ri-computer-line text-4xl"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-[#121a2c] via-transparent to-transparent opacity-70"></div>
                        </div>

                        <!-- تفاصيل المشروع والزر -->
                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <h3 class="text-base sm:text-lg font-bold text-white group-hover:text-blue-400 transition">
                                {{ $item->project_name }}
                            </h3>

                            <div class="mt-4 pt-4 border-t border-white/10 flex items-center justify-between">
                                <a href="{{ $item->project_link }}" target="_blank"
                                    class="inline-flex items-center gap-1.5 rounded-full bg-blue-600/15 border border-blue-500/30 px-4 py-2 text-xs font-bold text-blue-400 transition hover:bg-blue-600 hover:text-white active:scale-95">
                                    <span>معاينة المشروع</span>
                                    <i class="ri-arrow-left-line"></i>
                                </a>

                                <span class="text-xs text-slate-500 flex items-center gap-1">
                                    <i class="ri-external-link-line"></i>
                                    <span>موقع مباشر</span>
                                </span>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full text-center py-12 text-slate-500">
                        لا توجد مشاريع مضافة حالياً
                    </div>
                @endforelse
            </div>

        </section>

        <!-- ================= 5. قسم المهارات SKILLS ================= -->
        <section id="skills" class="relative mx-auto max-w-7xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">
            
            <div class="mx-auto mb-10 text-center max-w-2xl">
                <span class="inline-flex items-center gap-1.5 rounded-full border border-blue-500/20 bg-blue-500/10 px-3.5 py-1 text-xs font-bold text-blue-400 mb-2.5">
                    القدرات التقنية
                </span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-white">
                    المهارات والتقنيات
                </h2>
                <div class="mx-auto mt-3 h-1 w-16 rounded-full bg-blue-500"></div>
                <p class="mt-3 text-xs sm:text-sm text-slate-400 max-w-xl mx-auto">
                    الأدوات والمكتبات التي أعتمد عليها لبناء واجهات ويب تفاعلية، متجاوبة، وسريعة الأداء.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
                @forelse ($skills as $skill)
                    <div class="group rounded-3xl border border-white/10 bg-[#121a2c]/80 p-4 sm:p-5 text-center m3-card-hover backdrop-blur-sm flex flex-col items-center justify-center">
                        
                        <!-- أيقونة / صورة المهارة -->
                        <div class="mb-3 flex h-14 w-14 items-center justify-center rounded-2xl bg-white/5 border border-white/10 transition group-hover:scale-110 group-hover:border-blue-500/30">
                            @if ($skill->skill_image)
                                <img src="{{ asset('storage/' . $skill->skill_image) }}"
                                     class="h-9 w-9 rounded-xl object-contain"
                                     alt="{{ $skill->skill_name }}">
                            @else
                                <i class="ri-code-s-slash-line text-2xl text-blue-400"></i>
                            @endif
                        </div>

                        <!-- اسم المهارة -->
                        <h3 class="text-xs sm:text-sm font-bold text-slate-200 group-hover:text-white transition">
                            {{ $skill->skill_name }}
                        </h3>

                    </div>
                @empty
                    <div class="col-span-full text-center py-10 text-slate-500">
                        لا توجد مهارات مضافة حالياً
                    </div>
                @endforelse
            </div>

        </section>

        <!-- ================= 6. قسم تواصل معي CONTACT ================= -->
        <section id="contact" class="relative mx-auto max-w-7xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">
            
            <div class="mx-auto mb-10 text-center max-w-2xl">
                <span class="inline-flex items-center gap-1.5 rounded-full border border-blue-500/20 bg-blue-500/10 px-3.5 py-1 text-xs font-bold text-blue-400 mb-2.5">
                    <span class="flex h-2 w-2 rounded-full bg-blue-500 animate-pulse"></span>
                    تواصل مباشر
                </span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-white">
                    تواصل <span class="text-blue-500">معي</span>
                </h2>
                <div class="mx-auto mt-3 h-1 w-16 rounded-full bg-blue-500"></div>
                <p class="mt-3 text-xs sm:text-sm text-slate-400 max-w-xl mx-auto">
                    شاركني فكرتك أو تفاصيل مشروعك وسأقوم بالرد عليك سريعاً، أو تواصل فورياً عبر القنوات المباشرة.
                </p>
            </div>

            <!-- شبكة القسم المتجاوبة بالكامل للموبايل والأيباد والكمبيوتر -->
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-12 items-start max-w-6xl mx-auto">

                <!-- 📞 العمود الجانبي (كروت الاتصال السريع للموبايل) -->
                <div class="lg:col-span-5 space-y-3.5">
                    
                    <!-- كرت واتساب المباشر -->
                    <a href="https://wa.me/967779118281" target="_blank"
                        class="group flex items-center gap-4 rounded-3xl border border-white/10 bg-[#121a2c]/90 p-4 sm:p-5 m3-card-hover backdrop-blur-sm">
                        <div class="flex h-13 w-13 shrink-0 items-center justify-center rounded-2xl bg-green-500/15 text-green-400 text-2xl transition group-hover:scale-110 group-hover:bg-green-500 group-hover:text-white">
                            <i class="ri-whatsapp-line"></i>
                        </div>
                        <div class="min-w-0 flex-1">
                            <span class="text-[11px] font-bold text-slate-400 block">محادثة واتساب سريعة</span>
                            <h4 class="text-sm sm:text-base font-bold text-white">تواصل عبر الواتساب</h4>
                            <p class="text-xs text-green-400 font-semibold mt-0.5">انقر لبدء الدردشة الآن</p>
                        </div>
                        <i class="ri-arrow-left-s-line text-slate-400 group-hover:text-green-400 group-hover:-translate-x-1 transition text-xl"></i>
                    </a>

                    <!-- كرت البريد الإلكتروني -->
                    <a href="mailto:ziad10719999@gmail.com"
                        class="group flex items-center gap-4 rounded-3xl border border-white/10 bg-[#121a2c]/90 p-4 sm:p-5 m3-card-hover backdrop-blur-sm">
                        <div class="flex h-13 w-13 shrink-0 items-center justify-center rounded-2xl bg-blue-500/15 text-blue-400 text-2xl transition group-hover:scale-110 group-hover:bg-blue-500 group-hover:text-white">
                            <i class="ri-mail-line"></i>
                        </div>
                        <div class="min-w-0 flex-1">
                            <span class="text-[11px] font-bold text-slate-400 block">المراسلة البريدية</span>
                            <h4 class="text-sm sm:text-base font-bold text-white">ziad10719999@gmail.com</h4>
                            <p class="text-xs text-blue-400 font-semibold mt-0.5">إرسال بريد إلكتروني مباشر</p>
                        </div>
                        <i class="ri-arrow-left-s-line text-slate-400 group-hover:text-blue-400 group-hover:-translate-x-1 transition text-xl"></i>
                    </a>

                    <!-- كرت التفرغ والجاهزية -->
                    <div class="rounded-3xl border border-blue-500/20 bg-gradient-to-br from-blue-500/10 to-indigo-500/5 p-4 sm:p-5 backdrop-blur-sm">
                        <div class="flex items-center gap-2.5">
                            <span class="relative flex h-3 w-3">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                            </span>
                            <span class="text-xs sm:text-sm font-bold text-white">متاح لاستقبال المشاريع الجديدة</span>
                        </div>
                        <p class="text-xs text-slate-400 mt-2 leading-relaxed">
                            جاهز لتنفيذ وتطوير مواقع الويب وتطبيقات الواجهات الأمامية بأعلى دقة ومعايير عصرية.
                        </p>
                    </div>

                    <!-- شبكات التواصل -->
                    @if(count($socialLinks) > 0)
                        <div class="rounded-3xl border border-white/10 bg-[#121a2c]/90 p-4 sm:p-5 backdrop-blur-sm">
                            <span class="text-xs font-bold text-slate-400 block mb-3">حساباتي على الشبكات الاجتماعية:</span>
                            <div class="flex flex-wrap gap-2">
                                @foreach($socialLinks as $link)
                                    @php
                                        $nameLower = strtolower($link->name);
                                        $isWhatsApp = str_contains($nameLower, 'whatsapp') || str_contains($nameLower, 'واتساب');
                                        $isPhoneCall = str_starts_with($link->url, 'tel:') || str_contains($nameLower, 'هاتف') || str_contains($nameLower, 'اتصال');
                                        $phone = preg_replace('/\D+/', '', $link->url);
                                        if (!empty($phone) && !str_starts_with($phone, '967') && !str_starts_with($phone, '00967')) {
                                            $phone = '967' . ltrim($phone, '0');
                                        }
                                        $finalUrl = $isWhatsApp ? "https://wa.me/{$phone}" : ($isPhoneCall && !str_starts_with($link->url, 'tel:') ? "tel:+{$phone}" : $link->url);
                                    @endphp
                                    <a href="{{ $finalUrl }}" target="_blank" title="{{ $link->name }}"
                                        class="flex h-11 w-11 items-center justify-center rounded-2xl border border-white/10 bg-white/5 text-slate-300 transition hover:bg-blue-500/20 hover:border-blue-500/40 hover:text-blue-400 hover:-translate-y-1">
                                        <i class="{{ $link->icon ?: 'ri-link' }} text-lg"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>

                <!-- 📝 عمود الفورم M3 Filled Card (متوازن على الموبايل والأيباد والكمبيوتر) -->
                <div class="lg:col-span-7">
                    <div class="rounded-[2.5rem] border border-white/10 bg-[#121a2c]/90 p-5 sm:p-7 md:p-8 shadow-2xl backdrop-blur-sm">
                        
                        <div class="mb-6">
                            <h3 class="text-lg sm:text-xl font-bold text-white">أرسل رسالة سريعة</h3>
                            <p class="text-xs text-slate-400 mt-1">امتلئ الحقول وسأقوم بالرد عليك خلال ساعات</p>
                        </div>

                        <form id="contactForm" class="space-y-4 sm:space-y-5">
                            @csrf

                            <!-- إعدادات FormSubmit للوصول إلى Gmail -->
                            <input type="hidden" name="_captcha" value="false">
                            <input type="hidden" name="_subject" value="رسالة جديدة من الموقع">
                            <input type="hidden" name="_template" value="table">

                            <!-- الصف الأول: الاسم + الواتساب (متناسقين 50%/50% من مقاس sm والأيباد) -->
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <label class="mb-1.5 block text-xs font-bold text-slate-300">
                                        الاسم الكامل <span class="text-red-400">*</span>
                                    </label>
                                    <div class="relative">
                                        <i class="ri-user-3-line absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                                        <input name="name" required
                                            class="w-full h-13 rounded-2xl border border-white/10 bg-white/5 pr-11 pl-4 text-base text-white outline-none transition focus:border-blue-500 focus:bg-[#0c121e] focus:ring-4 focus:ring-blue-500/15 placeholder:text-slate-500"
                                            placeholder="الاسم الكامل" />
                                    </div>
                                </div>

                                <div>
                                    <label class="mb-1.5 block text-xs font-bold text-slate-300">
                                        رقم الواتساب <span class="text-slate-500 text-[11px]">(اختياري)</span>
                                    </label>
                                    <div class="relative">
                                        <i class="ri-whatsapp-line absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                                        <input name="whatsapp"
                                            class="w-full h-13 rounded-2xl border border-white/10 bg-white/5 pr-11 pl-4 text-base text-white outline-none transition focus:border-blue-500 focus:bg-[#0c121e] focus:ring-4 focus:ring-blue-500/15 placeholder:text-slate-500"
                                            placeholder="777777777" />
                                    </div>
                                </div>
                            </div>

                            <!-- الصف الثاني: البريد الإلكتروني + موضوع الرسالة (متناسقين 50%/50% على الأيباد) -->
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <label class="mb-1.5 block text-xs font-bold text-slate-300">
                                        البريد الإلكتروني <span class="text-red-400">*</span>
                                    </label>
                                    <div class="relative">
                                        <i class="ri-mail-line absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                                        <input name="email" type="email" required
                                            class="w-full h-13 rounded-2xl border border-white/10 bg-white/5 pr-11 pl-4 text-base text-white outline-none transition focus:border-blue-500 focus:bg-[#0c121e] focus:ring-4 focus:ring-blue-500/15 placeholder:text-slate-500"
                                            placeholder="name@example.com" />
                                    </div>
                                </div>

                                <div>
                                    <label class="mb-1.5 block text-xs font-bold text-slate-300">
                                        عنوان الرسالة <span class="text-slate-500 text-[11px]">(اختياري)</span>
                                    </label>
                                    <div class="relative">
                                        <i class="ri-edit-line absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                                        <input name="subject"
                                            class="w-full h-13 rounded-2xl border border-white/10 bg-white/5 pr-11 pl-4 text-base text-white outline-none transition focus:border-blue-500 focus:bg-[#0c121e] focus:ring-4 focus:ring-blue-500/15 placeholder:text-slate-500"
                                            placeholder="طلب استشارة أو مشروع..." />
                                    </div>
                                </div>
                            </div>

                            <!-- الصف الثالث: نص الرسالة -->
                            <div>
                                <label class="mb-1.5 block text-xs font-bold text-slate-300">
                                    تفاصيل المشروع أو الرسالة <span class="text-red-400">*</span>
                                </label>
                                <textarea name="message" required rows="4"
                                    class="w-full rounded-2xl border border-white/10 bg-white/5 p-4 text-base text-white outline-none transition focus:border-blue-500 focus:bg-[#0c121e] focus:ring-4 focus:ring-blue-500/15 placeholder:text-slate-500 leading-relaxed"
                                    placeholder="اكتب تفاصيل مشروعك، أهدافك، والميزات المطلوبة هنا..."></textarea>
                            </div>

                            <!-- زر الإرسال بنمط M3 Filled Pill Button -->
                            <div>
                                <button id="submitBtn" type="submit"
                                    class="w-full flex items-center justify-center gap-2 h-14 rounded-full bg-blue-600 text-white font-bold text-base transition duration-300 hover:bg-blue-500 hover:shadow-lg hover:shadow-blue-500/30 active:scale-[0.98]">
                                    <span>إرسال الرسالة</span>
                                    <i class="ri-send-plane-fill text-lg"></i>
                                </button>
                            </div>

                            <!-- إشعار النجاح -->
                            <div id="successMsg"
                                class="hidden rounded-2xl border border-green-500/30 bg-green-500/10 p-4 text-center text-sm font-bold text-green-400">
                                ✅ تم إرسال الرسالة بنجاح، سوف يتم التواصل معك عبر البريد الإلكتروني أو الواتس اب
                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </section>

    </main>

    <!-- 🌐 تذييل الصفحة M3 Minimalist Footer -->
    <footer class="border-t border-white/10 bg-[#060910] py-8 text-center text-xs text-slate-500">
        <div class="mx-auto max-w-7xl px-4 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <span class="h-8 w-8 rounded-xl bg-blue-500/15 border border-blue-500/30 text-blue-400 flex items-center justify-center font-bold">Z</span>
                <span class="text-sm font-bold text-slate-300">زياد صالح يسلم الحوري</span>
            </div>
            <p>© {{ date('Y') }} جميع الحقوق محفوظة — <span class="text-sm text-slate-300">زياد صالح يسلم الحوري</span></p>
            <a href="#home" class="rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-slate-400 hover:text-white hover:bg-white/10 transition">
                العودة للأعلى ↑
            </a>
        </div>
    </footer>

    <!-- 📜 Scripts -->
    <script>
        // إظهار وإخفاء قائمة الجوال
        const menuBtn = document.getElementById("menuBtn");
        const mobileMenu = document.getElementById("mobileMenu");
        const menuIcon = document.getElementById("menuIcon");

        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener("click", function () {
                const isHidden = mobileMenu.classList.contains("hidden");
                if (isHidden) {
                    mobileMenu.classList.remove("hidden");
                    menuIcon.classList.replace("ri-menu-4-line", "ri-close-line");
                } else {
                    mobileMenu.classList.add("hidden");
                    menuIcon.classList.replace("ri-close-line", "ri-menu-4-line");
                }
            });

            // إغلاق القائمة عند النقر على أي رابط
            document.querySelectorAll(".mobile-nav-link").forEach(link => {
                link.addEventListener("click", () => {
                    mobileMenu.classList.add("hidden");
                    menuIcon.classList.replace("ri-close-line", "ri-menu-4-line");
                });
            });
        }

        // إرسال رسالة تواصل معي وحفظها في قاعدة البيانات + إرسالها للـ Gmail
        document.getElementById("contactForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const form = e.target;
            const btn = document.getElementById("submitBtn");
            const msg = document.getElementById("successMsg");

            btn.innerHTML = `<span>جاري الإرسال...</span> <i class="ri-loader-4-line animate-spin text-lg"></i>`;
            btn.disabled = true;

            const formData = new FormData(form);

            // 1. إرسال إلى قاعدة البيانات لتظهر في لوحة التحكم
            const saveToDatabase = fetch("{{ route('contact.send') }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            }).catch(err => console.error("Database save error:", err));

            // 2. إرسال إلى Gmail عبر FormSubmit
            const sendToGmail = fetch("https://formsubmit.co/ziad10719999@gmail.com", {
                method: "POST",
                body: formData
            }).catch(err => console.error("Gmail send error:", err));

            Promise.allSettled([saveToDatabase, sendToGmail])
                .then(() => {
                    form.reset();
                    msg.classList.remove("hidden");
                    btn.innerHTML = `<span>تم الإرسال بنجاح ✔</span>`;
                    setTimeout(() => {
                        btn.innerHTML = `<span>إرسال الرسالة</span> <i class="ri-send-plane-fill text-lg"></i>`;
                        btn.disabled = false;
                    }, 4000);
                })
                .catch(() => {
                    alert("حدث خطأ أثناء الإرسال، يرجى المحاولة لاحقاً");
                    btn.innerHTML = `<span>إرسال الرسالة</span> <i class="ri-send-plane-fill text-lg"></i>`;
                    btn.disabled = false;
                });
        });
    </script>

</body>

</html>
