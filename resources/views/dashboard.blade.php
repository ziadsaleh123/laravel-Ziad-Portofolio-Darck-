<!DOCTYPE html>
<html lang="ar" dir="rtl" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>لوحة التحكم | إدارة محتوى الموقع</title>

    <!-- 🌐 Google Fonts: Readex Pro + Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Readex+Pro:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- 🎨 Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

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
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            900: '#1e3a8a',
                        },
                        dark: {
                            bg: '#090d16',
                            card: '#121a2c',
                            surface: '#0e1422',
                            border: 'rgba(255, 255, 255, 0.08)',
                            hover: '#18233c',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }

        html, body {
            font-family: "Readex Pro", "Plus Jakarta Sans", system-ui, sans-serif;
            background-color: #090d16;
            color: #f1f5f9;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* تخصيص شريط التمرير */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #090d16;
        }
        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #334155;
        }

        /* أنماط الحقول والكروت */
        .dash-card {
            background-color: #121a2c;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 1.5rem;
            padding: 1.25rem;
        }
        @media (min-width: 640px) {
            .dash-card {
                padding: 1.75rem;
                border-radius: 1.75rem;
            }
        }

        .dash-input {
            width: 100%;
            background-color: #0e1422;
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: #f8fafc;
            border-radius: 0.875rem;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            outline: none;
            transition: all 0.2s ease;
        }
        .dash-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.18);
            background-color: #141c30;
        }
        .dash-input:disabled, .dash-input[readonly] {
            opacity: 0.75;
            background-color: #0b0f19;
            cursor: not-allowed;
        }

        .dash-label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.8125rem;
            font-weight: 600;
            color: #94a3b8;
        }

        .nav-link-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border-radius: 0.875rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #94a3b8;
            transition: all 0.2s ease;
            border: 1px solid transparent;
        }
        .nav-link-item:hover {
            color: #ffffff;
            background-color: #18233c;
            border-color: rgba(255, 255, 255, 0.05);
        }
        .nav-link-item.active {
            color: #60a5fa;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.18), rgba(37, 99, 235, 0.08));
            border-color: rgba(59, 130, 246, 0.3);
            font-weight: 700;
        }

        /* إخفاء شريط التمرير للشاشات الصغيرة */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="min-h-screen bg-[#090d16] text-slate-100 flex flex-col pb-16 lg:pb-0">

    @php
        $page = request('page', 'home');
    @endphp

    <!-- ================= 📱 القائمة الجانبية للموبايل (Mobile Drawer / Offcanvas) ================= -->
    <div id="mobileDrawerOverlay"
        class="fixed inset-0 bg-black/70 backdrop-blur-sm z-50 hidden opacity-0 transition-opacity duration-300 lg:hidden"
        onclick="closeMobileDrawer()">
    </div>

    <aside id="mobileDrawer"
        class="fixed top-0 right-0 bottom-0 w-72 max-w-[85vw] bg-[#0e1422] border-l border-white/10 z-50 transform translate-x-full transition-transform duration-300 ease-out flex flex-col lg:hidden shadow-2xl">
        
        <!-- رأس القائمة -->
        <div class="p-5 border-b border-white/10 flex items-center justify-between">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5">
                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-500/20 border border-blue-500/30 text-blue-400 font-black text-base">
                    Z
                </span>
                <span class="text-base font-black tracking-wider text-white">
                    لوحة التحكم
                </span>
            </a>
            <button onclick="closeMobileDrawer()"
                class="flex h-9 w-9 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-slate-300 hover:text-white hover:bg-white/10 active:scale-95 transition">
                <i class="ri-close-line text-xl"></i>
            </button>
        </div>

        <!-- روابط القائمة -->
        <nav class="flex-1 overflow-y-auto p-4 space-y-1.5 no-scrollbar">
            <a href="{{ route('dashboard.page', ['page' => 'home']) }}"
                class="nav-link-item {{ $page == 'home' ? 'active' : '' }}">
                <i class="ri-home-5-line text-lg {{ $page == 'home' ? 'text-blue-400' : 'text-slate-400' }}"></i>
                <span>الرئيسية</span>
            </a>

            <a href="{{ route('dashboard.page', ['page' => 'about']) }}"
                class="nav-link-item {{ $page == 'about' ? 'active' : '' }}">
                <i class="ri-user-smile-line text-lg {{ $page == 'about' ? 'text-blue-400' : 'text-slate-400' }}"></i>
                <span>من أنا</span>
            </a>

            <a href="{{ route('dashboard.page', ['page' => 'services']) }}"
                class="nav-link-item {{ $page == 'services' ? 'active' : '' }}">
                <i class="ri-service-line text-lg {{ $page == 'services' ? 'text-blue-400' : 'text-slate-400' }}"></i>
                <span>الخدمات</span>
            </a>

            <a href="{{ route('dashboard.page', ['page' => 'projects']) }}"
                class="nav-link-item {{ $page == 'projects' ? 'active' : '' }}">
                <i class="ri-macbook-line text-lg {{ $page == 'projects' ? 'text-blue-400' : 'text-slate-400' }}"></i>
                <span>المشاريع</span>
            </a>

            <a href="{{ route('dashboard.page', ['page' => 'skills']) }}"
                class="nav-link-item {{ $page == 'skills' ? 'active' : '' }}">
                <i class="ri-code-s-slash-line text-lg {{ $page == 'skills' ? 'text-blue-400' : 'text-slate-400' }}"></i>
                <span>المهارات</span>
            </a>

            <a href="{{ route('dashboard.page', ['page' => 'contact']) }}"
                class="nav-link-item {{ $page == 'contact' ? 'active' : '' }}">
                <i class="ri-phone-line text-lg {{ $page == 'contact' ? 'text-blue-400' : 'text-slate-400' }}"></i>
                <span>التواصل والهاتف</span>
            </a>

            <a href="{{ route('dashboard.page', ['page' => 'messages']) }}"
                class="nav-link-item justify-between {{ $page == 'messages' ? 'active' : '' }}">
                <div class="flex items-center gap-3">
                    <i class="ri-chat-3-line text-lg {{ $page == 'messages' ? 'text-blue-400' : 'text-slate-400' }}"></i>
                    <span>الرسائل</span>
                </div>
                @if (!empty($unreadMessagesCount) && $unreadMessagesCount > 0)
                    <span class="bg-blue-600 text-white text-xs px-2.5 py-0.5 rounded-full font-bold animate-pulse">
                        {{ $unreadMessagesCount }}
                    </span>
                @endif
            </a>

            <div class="pt-3 border-t border-white/10 mt-3 space-y-2">
                <a href="{{ route('portofolio') }}" target="_blank"
                    class="flex items-center justify-center gap-2 rounded-xl bg-blue-600/15 border border-blue-500/30 text-blue-400 py-2.5 text-xs font-bold hover:bg-blue-600 hover:text-white transition">
                    <i class="ri-external-link-line"></i>
                    <span>معاينة الموقع المباشر</span>
                </a>
            </div>
        </nav>

        <!-- تسجيل الخروج في أسفل القائمة للموبايل -->
        <div class="p-4 border-t border-white/10">
            <div class="flex items-center gap-2.5 mb-3 px-2">
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-500/20 text-blue-400 font-bold text-xs">
                    {{ mb_substr(Auth::user()->name ?? 'A', 0, 1) }}
                </div>
                <div class="overflow-hidden">
                    <div class="text-xs font-bold text-white truncate">{{ Auth::user()->name }}</div>
                    <div class="text-[11px] text-slate-400 truncate">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 bg-red-500/15 hover:bg-red-600 text-red-400 hover:text-white py-2.5 rounded-xl font-bold text-xs transition border border-red-500/20">
                    <i class="ri-logout-box-r-line"></i>
                    <span>تسجيل الخروج</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- ================= 💻 القائمة الجانبية للشاشات الكبيرة (Desktop Sidebar) ================= -->
    <div class="flex min-h-screen">
        <aside class="w-72 bg-[#0e1422] border-l border-white/10 p-5 hidden lg:flex lg:flex-col justify-between shrink-0 shadow-xl">
            <div>
                <!-- الشعار -->
                <div class="flex items-center justify-between mb-8 pb-4 border-b border-white/10">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5">
                        <span class="flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-500/20 border border-blue-500/30 text-blue-400 font-extrabold text-lg">
                            Z
                        </span>
                        <div>
                            <span class="text-lg font-black tracking-wider text-white block">
                                ZIAD<span class="text-blue-500">.</span>
                            </span>
                            <span class="text-[11px] text-slate-400 font-medium">لوحة التحكم المركزية</span>
                        </div>
                    </a>
                </div>

                <!-- قائمة الروابط -->
                <nav class="space-y-1.5">
                    <a href="{{ route('dashboard.page', ['page' => 'home']) }}"
                        class="nav-link-item {{ $page == 'home' ? 'active' : '' }}">
                        <i class="ri-home-5-line text-lg {{ $page == 'home' ? 'text-blue-400' : 'text-slate-400' }}"></i>
                        <span>الرئيسية</span>
                    </a>

                    <a href="{{ route('dashboard.page', ['page' => 'about']) }}"
                        class="nav-link-item {{ $page == 'about' ? 'active' : '' }}">
                        <i class="ri-user-smile-line text-lg {{ $page == 'about' ? 'text-blue-400' : 'text-slate-400' }}"></i>
                        <span>من أنا</span>
                    </a>

                    <a href="{{ route('dashboard.page', ['page' => 'services']) }}"
                        class="nav-link-item {{ $page == 'services' ? 'active' : '' }}">
                        <i class="ri-service-line text-lg {{ $page == 'services' ? 'text-blue-400' : 'text-slate-400' }}"></i>
                        <span>الخدمات</span>
                    </a>

                    <a href="{{ route('dashboard.page', ['page' => 'projects']) }}"
                        class="nav-link-item {{ $page == 'projects' ? 'active' : '' }}">
                        <i class="ri-macbook-line text-lg {{ $page == 'projects' ? 'text-blue-400' : 'text-slate-400' }}"></i>
                        <span>المشاريع</span>
                    </a>

                    <a href="{{ route('dashboard.page', ['page' => 'skills']) }}"
                        class="nav-link-item {{ $page == 'skills' ? 'active' : '' }}">
                        <i class="ri-code-s-slash-line text-lg {{ $page == 'skills' ? 'text-blue-400' : 'text-slate-400' }}"></i>
                        <span>المهارات</span>
                    </a>

                    <a href="{{ route('dashboard.page', ['page' => 'contact']) }}"
                        class="nav-link-item {{ $page == 'contact' ? 'active' : '' }}">
                        <i class="ri-phone-line text-lg {{ $page == 'contact' ? 'text-blue-400' : 'text-slate-400' }}"></i>
                        <span>التواصل والهاتف</span>
                    </a>

                    <a href="{{ route('dashboard.page', ['page' => 'messages']) }}"
                        class="nav-link-item justify-between {{ $page == 'messages' ? 'active' : '' }}">
                        <div class="flex items-center gap-3">
                            <i class="ri-chat-3-line text-lg {{ $page == 'messages' ? 'text-blue-400' : 'text-slate-400' }}"></i>
                            <span>صندوق الرسائل</span>
                        </div>
                        @if (!empty($unreadMessagesCount) && $unreadMessagesCount > 0)
                            <span class="bg-blue-600 text-white text-xs px-2.5 py-0.5 rounded-full font-bold animate-pulse">
                                {{ $unreadMessagesCount }}
                            </span>
                        @endif
                    </a>
                </nav>
            </div>

            <!-- أسفل السايدبار للكمبيوتر -->
            <div class="pt-6 border-t border-white/10 space-y-3">
                <a href="{{ route('portofolio') }}" target="_blank"
                    class="flex items-center justify-center gap-2 rounded-xl bg-blue-600/15 border border-blue-500/30 text-blue-400 py-2.5 text-xs font-bold hover:bg-blue-600 hover:text-white transition">
                    <i class="ri-external-link-line"></i>
                    <span>معاينة الموقع الخارجي</span>
                </a>

                <div class="flex items-center justify-between p-2.5 rounded-xl bg-white/5 border border-white/5">
                    <div class="flex items-center gap-2.5 overflow-hidden">
                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-blue-500/20 text-blue-400 font-bold text-xs">
                            {{ mb_substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="overflow-hidden">
                            <div class="text-xs font-bold text-white truncate">{{ Auth::user()->name }}</div>
                            <div class="text-[10px] text-slate-400 truncate">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" title="تسجيل الخروج"
                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-500/20 text-red-400 hover:bg-red-600 hover:text-white transition">
                            <i class="ri-logout-box-r-line text-sm"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- ================= 📱 المحتوى الرئيسي (Main Content Area) ================= -->
        <main class="flex-1 w-full max-w-full overflow-x-hidden p-3 sm:p-5 lg:p-8">

            <!-- 🌟 شريط الهيدر العلوي (متجاوب للموبايل والديسكتوب) -->
            <header class="bg-[#0e1422] border border-white/10 rounded-2xl p-3.5 sm:p-5 mb-5 sm:mb-6 shadow-lg flex items-center justify-between">
                
                <div class="flex items-center gap-3">
                    <!-- زر فتح القائمة على الهواتف -->
                    <button onclick="openMobileDrawer()"
                        aria-label="فتح القائمة"
                        class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-slate-200 hover:bg-blue-600 hover:text-white hover:border-blue-500 lg:hidden active:scale-90 transition relative">
                        <i class="ri-menu-4-line text-xl"></i>
                        @if (!empty($unreadMessagesCount) && $unreadMessagesCount > 0)
                            <span class="absolute -top-1 -right-1 flex h-3 w-3">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500"></span>
                            </span>
                        @endif
                    </button>

                    <div>
                        <h1 class="text-base sm:text-xl md:text-2xl font-black text-white flex items-center gap-2">
                            <span>مرحباً، {{ Auth::user()->name }}</span>
                            <span class="hidden sm:inline-block text-xs font-semibold px-2.5 py-0.5 rounded-full bg-blue-500/15 border border-blue-500/30 text-blue-400">
                                مدير الموقع
                            </span>
                        </h1>
                        <p class="text-slate-400 text-xs sm:text-sm mt-0.5">
                            @if ($page == 'home') إدارة بيانات الصفحة الرئيسية
                            @elseif ($page == 'about') إدارة قسم من أنا
                            @elseif ($page == 'services') إدارة خدمات الموقع
                            @elseif ($page == 'projects') إدارة المشاريع والأعمال
                            @elseif ($page == 'skills') إدارة المهارات والتقنيات
                            @elseif ($page == 'contact') أرقام الهواتف ووسائل التواصل
                            @elseif ($page == 'messages') الرسائل الواردة من الزوار
                            @endif
                        </p>
                    </div>
                </div>

                <!-- أزرار الإجراء السريع في الهيدر -->
                <div class="flex items-center gap-2">
                    <a href="{{ route('portofolio') }}" target="_blank"
                        class="inline-flex items-center gap-1.5 rounded-xl border border-white/10 bg-white/5 hover:bg-blue-600 hover:border-blue-500 px-3 py-2 sm:px-4 sm:py-2.5 text-xs font-bold text-slate-200 hover:text-white transition active:scale-95 shadow-sm">
                        <i class="ri-external-link-line text-sm"></i>
                        <span class="hidden sm:inline">معاينة الموقع</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="lg:hidden">
                        @csrf
                        <button type="submit" title="تسجيل الخروج"
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-500/15 border border-red-500/20 text-red-400 hover:bg-red-600 hover:text-white transition active:scale-90">
                            <i class="ri-logout-box-r-line text-base"></i>
                        </button>
                    </form>
                </div>
            </header>


            <!-- ================= 🏠 1. قسم الرئيسية (HOME) ================= -->
            @if ($page == 'home')

                @if (session('success'))
                    <div class="mb-5 rounded-2xl border border-green-500/30 bg-green-500/15 p-4 text-green-400 text-sm font-semibold flex items-center gap-2">
                        <i class="ri-checkbox-circle-fill text-lg"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="dash-card">
                    <div class="flex flex-wrap items-center justify-between gap-3 mb-6 pb-4 border-b border-white/10">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black text-white">بيانات الصفحة الرئيسية</h2>
                            <p class="text-xs sm:text-sm text-slate-400 mt-1">تعديل الشعار والعنوان والوصف والإحصائيات الرئيسية</p>
                        </div>

                        <button type="button" onclick="editHome()"
                            class="inline-flex items-center gap-2 rounded-xl bg-amber-500/20 border border-amber-500/40 text-amber-400 hover:bg-amber-500 hover:text-white px-4 py-2 text-xs sm:text-sm font-bold transition active:scale-95">
                            <i class="ri-edit-2-line"></i>
                            <span>تفعيل وضع التعديل</span>
                        </button>
                    </div>

                    <!-- فورم الرئيسية -->
                    <form method="POST" action="{{ route('home.update') }}" enctype="multipart/form-data" class="space-y-5">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                            <!-- الاسم / الشعار -->
                            <div>
                                <label class="dash-label">اسم الشعار / العنوان المختصر</label>
                                <input id="logo" type="text" name="logo" value="{{ $home->logo ?? '' }}"
                                    class="dash-input" placeholder="مثال: ZIAD" readonly>
                            </div>

                            <!-- العنوان الرئيسي -->
                            <div>
                                <label class="dash-label">العنوان الرئيسي (Hero Title)</label>
                                <input id="main_title" type="text" name="main_title" value="{{ $home->main_title ?? '' }}"
                                    class="dash-input" placeholder="مثال: مطور واجهات أمامية ومواقع ويب احترافية" readonly>
                            </div>
                        </div>

                        <!-- الوصف -->
                        <div>
                            <label class="dash-label">الوصف التعريفي المختصر</label>
                            <textarea id="description" name="description" rows="4" class="dash-input"
                                placeholder="اكتب نبذة تظهر في مقدمة الصفحة..." readonly>{{ $home->description ?? '' }}</textarea>
                        </div>

                        <!-- الصورة الرئيسية -->
                        <div class="p-4 rounded-2xl bg-[#0e1422] border border-white/10">
                            <label class="dash-label">الصورة الرئيسية (Hero Image)</label>
                            <input id="main_image" type="file" name="main_image" class="dash-input text-xs" disabled accept="image/*">
                            @if (!empty($home->main_image))
                                <div class="mt-3 flex items-center gap-3">
                                    <img src="{{ asset('storage/' . $home->main_image) }}" alt="Hero"
                                        class="h-20 w-20 rounded-2xl border border-white/20 object-cover shadow-md">
                                    <span class="text-xs text-slate-400">الصورة الحالية في الموقع</span>
                                </div>
                            @endif
                        </div>

                        <!-- شبكة الإحصائيات (2 للموبايل و 4 للكمبيوتر) -->
                        <div class="pt-2">
                            <span class="dash-label mb-3 block">شريط الإحصائيات (الأرقام)</span>
                            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4">
                                <!-- سنوات الخبرة -->
                                <div class="bg-[#0e1422] p-3 sm:p-4 rounded-2xl border border-white/10">
                                    <label class="dash-label text-xs">سنوات الخبرة</label>
                                    <input id="experience_years" type="text" name="experience_years"
                                        value="{{ $home->experience_years ?? '' }}" class="dash-input text-center font-bold text-blue-400 text-base sm:text-lg" readonly>
                                </div>

                                <!-- عدد المشاريع -->
                                <div class="bg-[#0e1422] p-3 sm:p-4 rounded-2xl border border-white/10">
                                    <label class="dash-label text-xs">عدد المشاريع</label>
                                    <input id="projects_count" type="text" name="projects_count"
                                        value="{{ $home->projects_count ?? '' }}" class="dash-input text-center font-bold text-blue-400 text-base sm:text-lg" readonly>
                                </div>

                                <!-- عدد المهارات -->
                                <div class="bg-[#0e1422] p-3 sm:p-4 rounded-2xl border border-white/10">
                                    <label class="dash-label text-xs">عدد المهارات</label>
                                    <input id="skills_count" type="text" name="skills_count"
                                        value="{{ $home->skills_count ?? '' }}" class="dash-input text-center font-bold text-blue-400 text-base sm:text-lg" readonly>
                                </div>

                                <!-- العملاء -->
                                <div class="bg-[#0e1422] p-3 sm:p-4 rounded-2xl border border-white/10">
                                    <label class="dash-label text-xs">عملاء راضون</label>
                                    <input id="happy_clients" type="text" name="happy_clients"
                                        value="{{ $home->happy_clients ?? '' }}" class="dash-input text-center font-bold text-blue-400 text-base sm:text-lg" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- الأزرار -->
                        <div class="flex flex-wrap items-center gap-3 pt-4 border-t border-white/10">
                            <button type="submit"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-white px-6 py-3 font-bold text-sm shadow-lg shadow-blue-500/25 transition active:scale-95">
                                <i class="ri-save-line text-base"></i>
                                <span>حفظ كافة التغييرات</span>
                            </button>
                        </div>
                    </form>
                </div>

                <script>
                    function editHome() {
                        const fields = [
                            'logo', 'main_title', 'description',
                            'experience_years', 'projects_count', 'skills_count', 'happy_clients'
                        ];
                        fields.forEach(function(id) {
                            const el = document.getElementById(id);
                            if (el) el.removeAttribute('readonly');
                        });
                        const img = document.getElementById('main_image');
                        if (img) img.removeAttribute('disabled');

                        // تنبيه بصري
                        const old = document.getElementById('edit-home-alert');
                        if (old) old.remove();
                        const alertBox = document.createElement('div');
                        alertBox.id = 'edit-home-alert';
                        alertBox.className = 'mb-4 rounded-xl bg-amber-500/20 border border-amber-500/40 p-3.5 text-amber-300 font-bold text-xs sm:text-sm flex items-center gap-2';
                        alertBox.innerHTML = '<i class="ri-information-fill text-lg"></i> تم فتح جميع الحقول للتعديل، اضغط "حفظ كافة التغييرات" عند الانتهاء.';
                        document.querySelector('.dash-card').prepend(alertBox);
                    }
                </script>
            @endif


            <!-- ================= 👤 2. قسم من أنا (ABOUT) ================= -->
            @if ($page == 'about')
                @php
                    $isEditing = session('edit_mode', false);
                @endphp

                @if (session('success'))
                    <div class="mb-5 rounded-2xl border border-green-500/30 bg-green-500/15 p-4 text-green-400 text-sm font-semibold flex items-center gap-2">
                        <i class="ri-checkbox-circle-fill text-lg"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="dash-card">
                    <div class="flex flex-wrap items-center justify-between gap-3 mb-6 pb-4 border-b border-white/10">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black text-white">تعديل قسم من أنا</h2>
                            <p class="text-xs sm:text-sm text-slate-400 mt-1">إدارة النصوص والفقرات والبطاقات التعريفية المعروضة في الموقع</p>
                        </div>

                        @if (!$isEditing)
                            <form method="POST" action="{{ route('about.edit.mode') }}">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center gap-2 rounded-xl bg-amber-500/20 border border-amber-500/40 text-amber-400 hover:bg-amber-500 hover:text-white px-4 py-2 text-xs sm:text-sm font-bold transition active:scale-95">
                                    <i class="ri-edit-2-line"></i>
                                    <span>تعديل البيانات</span>
                                </button>
                            </form>
                        @endif
                    </div>

                    @if ($isEditing)
                        <form method="POST" action="{{ route('about.update') }}" class="space-y-5">
                            @csrf

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <!-- عنوان القسم -->
                                <div>
                                    <label class="dash-label">عنوان القسم</label>
                                    <input type="text" name="section_title" value="{{ $about->section_title ?? 'من أنا' }}" class="dash-input">
                                </div>

                                <!-- الشارة -->
                                <div>
                                    <label class="dash-label">الشارة (Badge)</label>
                                    <input type="text" name="badge" value="{{ $about->badge ?? '' }}" class="dash-input" placeholder="مثال: تعرف علي">
                                </div>
                            </div>

                            <!-- الوصف المختصر -->
                            <div>
                                <label class="dash-label">الوصف المختصر</label>
                                <textarea name="section_description" rows="3" class="dash-input">{{ $about->section_description ?? '' }}</textarea>
                            </div>

                            <!-- العنوان الكبير -->
                            <div>
                                <label class="dash-label">العنوان الكبير المميز</label>
                                <input type="text" name="main_title" value="{{ $about->main_title ?? '' }}" class="dash-input">
                            </div>

                            <!-- الفقرات -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="dash-label">الفقرة الأولى</label>
                                    <textarea name="paragraph_one" rows="4" class="dash-input">{{ $about->paragraph_one ?? '' }}</textarea>
                                </div>

                                <div>
                                    <label class="dash-label">الفقرة الثانية</label>
                                    <textarea name="paragraph_two" rows="4" class="dash-input">{{ $about->paragraph_two ?? '' }}</textarea>
                                </div>
                            </div>

                            <!-- بطاقات المعلومات المختصرة -->
                            <div>
                                <span class="dash-label mb-3 block">البطاقات السريعة</span>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                                    <div>
                                        <label class="dash-label text-xs">الاسم</label>
                                        <input type="text" name="name" value="{{ $about->name ?? '' }}" class="dash-input" placeholder="الاسم">
                                    </div>
                                    <div>
                                        <label class="dash-label text-xs">التخصص</label>
                                        <input type="text" name="specialty" value="{{ $about->specialty ?? '' }}" class="dash-input" placeholder="التخصص">
                                    </div>
                                    <div>
                                        <label class="dash-label text-xs">التركيز</label>
                                        <input type="text" name="focus" value="{{ $about->focus ?? '' }}" class="dash-input" placeholder="التركيز">
                                    </div>
                                    <div>
                                        <label class="dash-label text-xs">الهدف</label>
                                        <input type="text" name="goal" value="{{ $about->goal ?? '' }}" class="dash-input" placeholder="الهدف">
                                    </div>
                                </div>
                            </div>

                            <!-- الأزرار -->
                            <div class="flex flex-wrap items-center gap-3 pt-4 border-t border-white/10">
                                <button type="submit"
                                    class="inline-flex items-center gap-2 rounded-xl bg-green-600 hover:bg-green-500 text-white px-6 py-3 font-bold text-sm shadow-lg shadow-green-500/20 transition active:scale-95">
                                    <i class="ri-save-line"></i>
                                    <span>حفظ التعديلات</span>
                                </button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('about.close.mode') }}" class="mt-3">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center gap-1.5 rounded-xl border border-white/10 bg-white/5 hover:bg-white/10 text-slate-300 px-5 py-2.5 font-bold text-xs transition">
                                <i class="ri-close-line"></i>
                                <span>إلغاء وضع التعديل</span>
                            </button>
                        </form>
                    @else
                        <!-- عرض ملخص البيانات في وضع القراءة -->
                        <div class="space-y-4">
                            <div class="bg-[#0e1422] p-4 rounded-2xl border border-white/10">
                                <span class="text-xs text-slate-400 font-semibold block mb-1">العنوان الرئيسي:</span>
                                <h3 class="text-lg font-bold text-white">{{ $about->main_title ?? 'لم يتم التعيين' }}</h3>
                                <p class="text-sm text-slate-300 mt-2">{{ $about->section_description ?? 'لا يوجد وصف حالياً' }}</p>
                            </div>

                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                <div class="bg-[#0e1422] p-3 rounded-xl border border-white/10">
                                    <span class="text-[11px] text-slate-400 block">الاسم:</span>
                                    <span class="text-xs sm:text-sm font-bold text-blue-400">{{ $about->name ?? '—' }}</span>
                                </div>
                                <div class="bg-[#0e1422] p-3 rounded-xl border border-white/10">
                                    <span class="text-[11px] text-slate-400 block">التخصص:</span>
                                    <span class="text-xs sm:text-sm font-bold text-blue-400">{{ $about->specialty ?? '—' }}</span>
                                </div>
                                <div class="bg-[#0e1422] p-3 rounded-xl border border-white/10">
                                    <span class="text-[11px] text-slate-400 block">التركيز:</span>
                                    <span class="text-xs sm:text-sm font-bold text-blue-400">{{ $about->focus ?? '—' }}</span>
                                </div>
                                <div class="bg-[#0e1422] p-3 rounded-xl border border-white/10">
                                    <span class="text-[11px] text-slate-400 block">الهدف:</span>
                                    <span class="text-xs sm:text-sm font-bold text-blue-400">{{ $about->goal ?? '—' }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif


            <!-- ================= 🛠️ 3. قسم الخدمات (SERVICES) ================= -->
            @if ($page == 'services')
                @php
                    $isEditing = !empty($editService);
                @endphp

                @if (session('success'))
                    <div class="mb-5 rounded-2xl border border-green-500/30 bg-green-500/15 p-4 text-green-400 text-sm font-semibold flex items-center gap-2">
                        <i class="ri-checkbox-circle-fill text-lg"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="dash-card mb-6">
                    <div class="flex items-center justify-between mb-5 pb-3 border-b border-white/10">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black text-white">
                                {{ $isEditing ? 'تعديل الخدمة' : 'إضافة خدمة جديدة' }}
                            </h2>
                            <p class="text-xs sm:text-sm text-slate-400 mt-0.5">إدارة الخدمات التي تقدمها للعملاء</p>
                        </div>
                        @if ($isEditing)
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-500/20 text-blue-400 border border-blue-500/30">
                                وضع التعديل
                            </span>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('services.update') }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @if ($isEditing)
                            <input type="hidden" name="id" value="{{ $editService->id }}">
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- عنوان الخدمة -->
                            <div>
                                <label class="dash-label">عنوان الخدمة</label>
                                <input type="text" name="service_title"
                                    value="{{ old('service_title', $editService->service_title ?? '') }}"
                                    class="dash-input" placeholder="مثال: تطوير واجهات الويب" required>
                            </div>

                            <!-- الحالة -->
                            <div>
                                <label class="dash-label">حالة الظهور في الموقع</label>
                                <select name="service_status" class="dash-input cursor-pointer">
                                    <option value="متاحة" {{ old('service_status', $editService->service_status ?? 'متاحة') === 'متاحة' ? 'selected' : '' }}>
                                        ✅ متاحة — ظاهرة في الموقع
                                    </option>
                                    <option value="غير متاحة" {{ old('service_status', $editService->service_status ?? '') === 'غير متاحة' ? 'selected' : '' }}>
                                        🚫 غير متاحة — مخفية مؤقتاً
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- وصف الخدمة -->
                        <div>
                            <label class="dash-label">وصف الخدمة</label>
                            <textarea name="service_description" class="dash-input" rows="3"
                                placeholder="اكتب تفاصيل ومزايا هذه الخدمة..." required>{{ old('service_description', $editService->service_description ?? '') }}</textarea>
                        </div>

                        <!-- صورة الخدمة -->
                        <div class="p-3.5 rounded-xl bg-[#0e1422] border border-white/10">
                            <label class="dash-label">صورة / أيقونة الخدمة</label>
                            <input type="file" name="service_image" class="dash-input text-xs" accept="image/*">
                            @if (!empty($editService->service_image))
                                <div class="mt-2.5 flex items-center gap-3">
                                    <img src="{{ asset('storage/' . $editService->service_image) }}"
                                        class="h-14 w-14 rounded-xl object-cover border border-white/20">
                                    <span class="text-xs text-slate-400">الصورة الحالية</span>
                                </div>
                            @endif
                        </div>

                        <!-- الأزرار -->
                        <div class="flex flex-wrap items-center gap-3 pt-2">
                            <button type="submit"
                                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-500 text-white px-6 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition shadow-lg shadow-blue-500/20 active:scale-95">
                                <i class="ri-save-line"></i>
                                <span>{{ $isEditing ? 'تحديث الخدمة' : 'إضافة الخدمة' }}</span>
                            </button>

                            @if ($isEditing)
                                <a href="{{ route('dashboard.page', ['page' => 'services']) }}"
                                    class="inline-flex items-center gap-1 bg-gray-700 hover:bg-gray-600 text-white px-5 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition">
                                    <i class="ri-close-line"></i>
                                    <span>إلغاء</span>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- قائمة الخدمات الحالية (متجاوبة بنظام بطاقات للموبايل وجدول للكمبيوتر) -->
                <div class="dash-card">
                    <h3 class="text-lg font-bold text-white mb-4">قائمة الخدمات المضافة ({{ count($services) }})</h3>

                    <!-- عرض البطاقات للموبايل -->
                    <div class="grid grid-cols-1 gap-3.5 sm:hidden">
                        @forelse($services as $item)
                            <div class="bg-[#0e1422] p-4 rounded-2xl border border-white/10 space-y-3">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="flex items-center gap-3">
                                        @if ($item->service_image)
                                            <img src="{{ asset('storage/' . $item->service_image) }}"
                                                class="h-12 w-12 rounded-xl object-cover border border-white/10 shrink-0">
                                        @else
                                            <div class="h-12 w-12 rounded-xl bg-blue-500/20 flex items-center justify-center text-blue-400 text-xl shrink-0">
                                                <i class="ri-service-line"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <h4 class="font-bold text-white text-sm">{{ $item->service_title }}</h4>
                                            @if (($item->service_status ?? 'متاحة') === 'متاحة')
                                                <span class="inline-block text-[11px] font-bold text-green-400 bg-green-500/20 px-2 py-0.5 rounded-md mt-1">متاحة</span>
                                            @else
                                                <span class="inline-block text-[11px] font-bold text-red-400 bg-red-500/20 px-2 py-0.5 rounded-md mt-1">مخفية</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <p class="text-xs text-slate-400 leading-relaxed">{{ $item->service_description }}</p>
                                <div class="flex items-center justify-end gap-2 pt-2 border-t border-white/5">
                                    <a href="{{ route('dashboard.page', ['page' => 'services', 'editService' => $item->id]) }}"
                                        class="inline-flex items-center gap-1 bg-blue-600/20 hover:bg-blue-600 text-blue-400 hover:text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                        <i class="ri-edit-line"></i>
                                        <span>تعديل</span>
                                    </a>
                                    <form method="POST" action="{{ route('services.delete', $item->id) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذه الخدمة؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center gap-1 bg-red-600/20 hover:bg-red-600 text-red-400 hover:text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                            <i class="ri-delete-bin-line"></i>
                                            <span>حذف</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 text-slate-400 text-xs">لا توجد خدمات مضافة حالياً</div>
                        @endforelse
                    </div>

                    <!-- جدول الشاشات الكبيرة -->
                    <div class="hidden sm:block overflow-x-auto">
                        <table class="w-full text-right border-collapse">
                            <thead>
                                <tr class="border-b border-white/10 text-slate-400 text-xs font-bold">
                                    <th class="p-3">الصورة</th>
                                    <th class="p-3">العنوان</th>
                                    <th class="p-3">الوصف</th>
                                    <th class="p-3">الحالة</th>
                                    <th class="p-3">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-sm">
                                @forelse($services as $item)
                                    <tr class="hover:bg-white/5 transition">
                                        <td class="p-3">
                                            @if ($item->service_image)
                                                <img src="{{ asset('storage/' . $item->service_image) }}"
                                                    class="h-10 w-10 rounded-lg object-cover border border-white/10">
                                            @else
                                                <span class="text-slate-500 text-xs">لا توجد</span>
                                            @endif
                                        </td>
                                        <td class="p-3 font-bold text-white">{{ $item->service_title }}</td>
                                        <td class="p-3 text-slate-300 max-w-xs text-xs">{{ Str::limit($item->service_description, 80) }}</td>
                                        <td class="p-3">
                                            @if (($item->service_status ?? 'متاحة') === 'متاحة')
                                                <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-green-500/20 text-green-400">متاحة</span>
                                            @else
                                                <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-red-500/20 text-red-400">مخفية</span>
                                            @endif
                                        </td>
                                        <td class="p-3 whitespace-nowrap">
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('dashboard.page', ['page' => 'services', 'editService' => $item->id]) }}"
                                                    class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                                    تعديل
                                                </a>
                                                <form method="POST" action="{{ route('services.delete', $item->id) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذه الخدمة؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-600 hover:bg-red-500 text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                                        حذف
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center p-8 text-slate-400 text-xs">لا توجد خدمات مضافة حالياً</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif


            <!-- ================= 💻 4. قسم المشاريع (PROJECTS) ================= -->
            @if ($page == 'projects')
                @php
                    $isEditingProj = !empty($editProject);
                @endphp

                @if (session('success'))
                    <div class="mb-5 rounded-2xl border border-green-500/30 bg-green-500/15 p-4 text-green-400 text-sm font-semibold flex items-center gap-2">
                        <i class="ri-checkbox-circle-fill text-lg"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="dash-card mb-6">
                    <div class="flex items-center justify-between mb-5 pb-3 border-b border-white/10">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black text-white">
                                {{ $isEditingProj ? 'تعديل المشروع' : 'إضافة مشروع جديد' }}
                            </h2>
                            <p class="text-xs sm:text-sm text-slate-400 mt-0.5">إدارة معرض الأعمال والمشاريع السابقة</p>
                        </div>
                        @if ($isEditingProj)
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-500/20 text-blue-400 border border-blue-500/30">
                                وضع التعديل
                            </span>
                        @endif
                    </div>

                    <form method="POST"
                        action="{{ $isEditingProj ? route('projects.update', $editProject->id) : route('projects.store') }}"
                        enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @if ($isEditingProj)
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- اسم المشروع -->
                            <div>
                                <label class="dash-label">اسم المشروع</label>
                                <input type="text" name="project_name"
                                    value="{{ old('project_name', $editProject->project_name ?? '') }}"
                                    class="dash-input" placeholder="مثال: منصة متجر إلكتروني" required>
                            </div>

                            <!-- رابط المشروع -->
                            <div>
                                <label class="dash-label">رابط المشروع المباشر</label>
                                <input type="url" name="project_link"
                                    value="{{ old('project_link', $editProject->project_link ?? '') }}"
                                    class="dash-input font-mono text-xs sm:text-sm" placeholder="https://example.com" required>
                            </div>
                        </div>

                        <!-- صورة المشروع -->
                        <div class="p-3.5 rounded-xl bg-[#0e1422] border border-white/10">
                            <label class="dash-label">صورة غلاف المشروع</label>
                            <input type="file" name="project_image" class="dash-input text-xs" accept="image/*">
                            @if (!empty($editProject->project_image))
                                <div class="mt-2.5 flex items-center gap-3">
                                    <img src="{{ asset('storage/' . $editProject->project_image) }}"
                                        class="h-16 w-24 rounded-xl object-cover border border-white/20 shadow">
                                    <span class="text-xs text-slate-400">الغلاف الحالي</span>
                                </div>
                            @endif
                        </div>

                        <!-- أزرار الإجراء -->
                        <div class="flex flex-wrap items-center gap-3 pt-2">
                            <button type="submit"
                                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-500 text-white px-6 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition shadow-lg shadow-blue-500/20 active:scale-95">
                                <i class="ri-save-line"></i>
                                <span>{{ $isEditingProj ? 'تحديث المشروع' : 'حفظ المشروع' }}</span>
                            </button>

                            @if ($isEditingProj)
                                <a href="{{ route('dashboard.page', ['page' => 'projects']) }}"
                                    class="inline-flex items-center gap-1 bg-gray-700 hover:bg-gray-600 text-white px-5 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition">
                                    <i class="ri-close-line"></i>
                                    <span>إلغاء</span>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- قائمة المشاريع (بطاقات للموبايل وجدول للكمبيوتر) -->
                <div class="dash-card">
                    <h3 class="text-lg font-bold text-white mb-4">المشاريع المضافة ({{ count($projects) }})</h3>

                    <!-- بطاقات الموبايل -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 lg:hidden">
                        @forelse($projects as $item)
                            <div class="bg-[#0e1422] p-4 rounded-2xl border border-white/10 flex flex-col justify-between space-y-3">
                                <div class="space-y-2">
                                    @if ($item->project_image)
                                        <img src="{{ asset('storage/' . $item->project_image) }}"
                                            class="w-full h-36 rounded-xl object-cover border border-white/10">
                                    @else
                                        <div class="w-full h-24 rounded-xl bg-blue-500/15 flex items-center justify-center text-blue-400 text-2xl">
                                            <i class="ri-macbook-line"></i>
                                        </div>
                                    @endif
                                    <h4 class="font-bold text-white text-sm mt-2">{{ $item->project_name }}</h4>
                                    <a href="{{ $item->project_link }}" target="_blank"
                                        class="text-xs text-blue-400 hover:underline flex items-center gap-1 truncate">
                                        <i class="ri-link"></i>
                                        <span>{{ parse_url($item->project_link, PHP_URL_HOST) ?? $item->project_link }}</span>
                                    </a>
                                </div>

                                <div class="flex items-center justify-end gap-2 pt-2 border-t border-white/5">
                                    <a href="{{ route('dashboard.page', ['page' => 'projects', 'editProject' => $item->id]) }}"
                                        class="inline-flex items-center gap-1 bg-blue-600/20 hover:bg-blue-600 text-blue-400 hover:text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                        <i class="ri-edit-line"></i>
                                        <span>تعديل</span>
                                    </a>
                                    <form method="POST" action="{{ route('projects.delete', $item->id) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذا المشروع؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center gap-1 bg-red-600/20 hover:bg-red-600 text-red-400 hover:text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                            <i class="ri-delete-bin-line"></i>
                                            <span>حذف</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-2 text-center py-8 text-slate-400 text-xs">لا توجد مشاريع مضافة حالياً</div>
                        @endforelse
                    </div>

                    <!-- جدول الكمبيوتر -->
                    <div class="hidden lg:block overflow-x-auto">
                        <table class="w-full text-right border-collapse">
                            <thead>
                                <tr class="border-b border-white/10 text-slate-400 text-xs font-bold">
                                    <th class="p-3">الغلاف</th>
                                    <th class="p-3">اسم المشروع</th>
                                    <th class="p-3">الرابط</th>
                                    <th class="p-3">العمليات</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-sm">
                                @forelse ($projects as $item)
                                    <tr class="hover:bg-white/5 transition">
                                        <td class="p-3">
                                            @if ($item->project_image)
                                                <img src="{{ asset('storage/' . $item->project_image) }}"
                                                    class="h-12 w-20 rounded-lg object-cover border border-white/10">
                                            @else
                                                <span class="text-slate-500 text-xs">لا توجد</span>
                                            @endif
                                        </td>
                                        <td class="p-3 font-bold text-white">{{ $item->project_name }}</td>
                                        <td class="p-3">
                                            <a href="{{ $item->project_link }}" target="_blank"
                                                class="text-blue-400 hover:underline text-xs inline-flex items-center gap-1">
                                                <span>{{ parse_url($item->project_link, PHP_URL_HOST) ?? $item->project_link }}</span>
                                                <i class="ri-external-link-line text-xs"></i>
                                            </a>
                                        </td>
                                        <td class="p-3 whitespace-nowrap">
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('dashboard.page', ['page' => 'projects', 'editProject' => $item->id]) }}"
                                                    class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                                    تعديل
                                                </a>
                                                <form method="POST" action="{{ route('projects.delete', $item->id) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذا المشروع؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-600 hover:bg-red-500 text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                                        حذف
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center p-8 text-slate-400 text-xs">لا توجد مشاريع مضافة حالياً</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif


            <!-- ================= ⚡ 5. قسم المهارات (SKILLS) ================= -->
            @if ($page == 'skills')
                @php
                    $isEditingSkill = !empty($editSkill);
                @endphp

                @if (session('success'))
                    <div class="mb-5 rounded-2xl border border-green-500/30 bg-green-500/15 p-4 text-green-400 text-sm font-semibold flex items-center gap-2">
                        <i class="ri-checkbox-circle-fill text-lg"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="dash-card mb-6">
                    <div class="flex items-center justify-between mb-5 pb-3 border-b border-white/10">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black text-white">
                                {{ $isEditingSkill ? 'تعديل المهارة' : 'إضافة مهارة جديدة' }}
                            </h2>
                            <p class="text-xs sm:text-sm text-slate-400 mt-0.5">التقنيات واللغات البرمجية التي تتقنها</p>
                        </div>
                        @if ($isEditingSkill)
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-500/20 text-blue-400 border border-blue-500/30">
                                وضع التعديل
                            </span>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('skills.storeOrUpdate') }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @if ($isEditingSkill)
                            <input type="hidden" name="id" value="{{ $editSkill->id }}">
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="dash-label">اسم المهارة / التقنية</label>
                                <input type="text" name="skill_name"
                                    value="{{ old('skill_name', $editSkill->skill_name ?? '') }}"
                                    class="dash-input" placeholder="مثال: Laravel, Vue.js, Tailwind CSS" required>
                            </div>

                            <div>
                                <label class="dash-label">شعار / أيقونة المهارة</label>
                                <input type="file" name="skill_image" class="dash-input text-xs" accept="image/*">
                            </div>
                        </div>

                        @if (!empty($editSkill->skill_image))
                            <div class="flex items-center gap-3 p-3 bg-[#0e1422] rounded-xl border border-white/10">
                                <img src="{{ asset('storage/' . $editSkill->skill_image) }}"
                                    class="h-12 w-12 rounded-lg object-contain bg-white/5 p-1 border border-white/10">
                                <span class="text-xs text-slate-400">الأيقونة الحالية</span>
                            </div>
                        @endif

                        <div class="flex flex-wrap items-center gap-3 pt-2">
                            <button type="submit"
                                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-500 text-white px-6 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition shadow-lg shadow-blue-500/20 active:scale-95">
                                <i class="ri-save-line"></i>
                                <span>{{ $isEditingSkill ? 'تحديث المهارة' : 'حفظ المهارة' }}</span>
                            </button>

                            @if ($isEditingSkill)
                                <a href="{{ route('dashboard.page', ['page' => 'skills']) }}"
                                    class="inline-flex items-center gap-1 bg-gray-700 hover:bg-gray-600 text-white px-5 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition">
                                    <i class="ri-close-line"></i>
                                    <span>إلغاء</span>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- قائمة المهارات المضافة (شبكة بطاقات مريحة للموبايل والكمبيوتر) -->
                <div class="dash-card">
                    <h3 class="text-lg font-bold text-white mb-4">المهارات المضافة ({{ count($skills) }})</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                        @forelse ($skills as $item)
                            <div class="bg-[#0e1422] p-3 sm:p-4 rounded-2xl border border-white/10 flex flex-col items-center justify-between text-center space-y-2.5 group hover:border-blue-500/40 transition">
                                @if ($item->skill_image)
                                    <img src="{{ asset('storage/' . $item->skill_image) }}"
                                        class="h-12 w-12 rounded-xl object-contain bg-white/5 p-1.5 border border-white/10">
                                @else
                                    <div class="h-12 w-12 rounded-xl bg-blue-500/15 flex items-center justify-center text-blue-400 text-xl font-black">
                                        <i class="ri-code-line"></i>
                                    </div>
                                @endif

                                <span class="font-bold text-white text-xs sm:text-sm truncate max-w-full block">
                                    {{ $item->skill_name }}
                                </span>

                                <div class="flex items-center gap-1.5 pt-1 w-full justify-center">
                                    <a href="{{ route('skills.edit', ['page' => 'skills', 'id' => $item->id]) }}"
                                        title="تعديل"
                                        class="flex h-7 w-7 items-center justify-center rounded-lg bg-blue-600/20 text-blue-400 hover:bg-blue-600 hover:text-white text-xs transition">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    <form method="POST" action="{{ route('skills.delete', $item->id) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذه المهارة؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="حذف"
                                            class="flex h-7 w-7 items-center justify-center rounded-lg bg-red-600/20 text-red-400 hover:bg-red-600 hover:text-white text-xs transition">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-8 text-slate-400 text-xs">لا توجد مهارات مضافة حالياً</div>
                        @endforelse
                    </div>
                </div>
            @endif


            <!-- ================= 📞 6. قسم التواصل والهاتف (CONTACT & PHONE) ================= -->
            @if ($page == 'contact')
                @php
                    $isEditingSocial = !empty($editSocial);
                @endphp

                @if (session('success'))
                    <div class="mb-5 rounded-2xl border border-green-500/30 bg-green-500/15 p-4 text-green-400 text-sm font-semibold flex items-center gap-2">
                        <i class="ri-checkbox-circle-fill text-lg"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="dash-card mb-6">
                    <div class="flex items-center justify-between mb-5 pb-3 border-b border-white/10">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black text-white">
                                {{ $isEditingSocial ? 'تعديل وسيلة التواصل' : 'إدارة وسائل التواصل وأرقام الهواتف' }}
                            </h2>
                            <p class="text-xs sm:text-sm text-slate-400 mt-0.5">
                                يمكنك إدخال أرقام الهواتف والواتساب والروابط الاجتماعية لتظهر في موقعك
                            </p>
                        </div>
                        @if ($isEditingSocial)
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-500/20 text-blue-400 border border-blue-500/30">
                                وضع التعديل
                            </span>
                        @endif
                    </div>

                    <!-- أزرار الاختيار السريع للأنماط الأكثر طلباً -->
                    <div class="mb-4">
                        <span class="dash-label text-xs mb-2">إضافة سريعة مسبقة التعبئة:</span>
                        <div class="flex flex-wrap gap-2">
                            <button type="button" onclick="fillPreset('واتساب (WhatsApp)', '777777777', 'ri-whatsapp-fill')"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-green-500/15 hover:bg-green-500 hover:text-white border border-green-500/30 text-green-400 text-xs font-bold transition">
                                <i class="ri-whatsapp-fill text-sm"></i>
                                <span>واتساب (هاتف)</span>
                            </button>

                            <button type="button" onclick="fillPreset('هاتف / اتصال مباشر', 'tel:+967777777777', 'ri-phone-fill')"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-blue-500/15 hover:bg-blue-500 hover:text-white border border-blue-500/30 text-blue-400 text-xs font-bold transition">
                                <i class="ri-phone-fill text-sm"></i>
                                <span>اتصال هاتفي</span>
                            </button>

                            <button type="button" onclick="fillPreset('Telegram', 'https://t.me/username', 'ri-telegram-fill')"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-sky-500/15 hover:bg-sky-500 hover:text-white border border-sky-500/30 text-sky-400 text-xs font-bold transition">
                                <i class="ri-telegram-fill text-sm"></i>
                                <span>تيليجرام</span>
                            </button>

                            <button type="button" onclick="fillPreset('LinkedIn', 'https://linkedin.com/in/username', 'ri-linkedin-box-fill')"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-indigo-500/15 hover:bg-indigo-500 hover:text-white border border-indigo-500/30 text-indigo-400 text-xs font-bold transition">
                                <i class="ri-linkedin-box-fill text-sm"></i>
                                <span>لينكد إن</span>
                            </button>

                            <button type="button" onclick="fillPreset('GitHub', 'https://github.com/username', 'ri-github-fill')"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-500/15 hover:bg-slate-500 hover:text-white border border-slate-500/30 text-slate-300 text-xs font-bold transition">
                                <i class="ri-github-fill text-sm"></i>
                                <span>جيت هاب</span>
                            </button>
                        </div>
                    </div>

                    <form method="POST"
                        action="{{ $isEditingSocial ? route('social.update', $editSocial->id) : route('social.store') }}"
                        class="space-y-4">
                        @csrf
                        @if ($isEditingSocial)
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- اسم المنصة -->
                            <div>
                                <label class="dash-label">اسم المنصة أو وسيلة الاتصال</label>
                                <input id="social_name" type="text" name="name"
                                    value="{{ old('name', $editSocial->name ?? '') }}"
                                    placeholder="مثال: WhatsApp, هاتف, LinkedIn"
                                    class="dash-input" required>
                            </div>

                            <!-- رقم الهاتف أو الرابط -->
                            <div>
                                <label class="dash-label">رقم الهاتف أو الرابط</label>
                                <input id="social_url" type="text" name="url"
                                    value="{{ old('url', $editSocial->url ?? '') }}"
                                    placeholder="أدخل رقم الهاتف مثل 779118281 أو رابط URL"
                                    class="dash-input font-mono text-xs sm:text-sm" required>
                                <span class="text-[11px] text-slate-400 mt-1 block">
                                    💡 يقبل أرقام الهواتف المباشرة (مثل 779118281) ويتم تحويلها لـ WhatsApp أو اتصال تلقائياً.
                                </span>
                            </div>

                            <!-- كود الأيقونة -->
                            <div>
                                <label class="dash-label">كود الأيقونة (Remix Icon)</label>
                                <input id="social_icon" type="text" name="icon"
                                    value="{{ old('icon', $editSocial->icon ?? '') }}"
                                    placeholder="ri-whatsapp-fill, ri-phone-fill, ri-mail-fill"
                                    class="dash-input font-mono text-xs sm:text-sm">
                            </div>
                        </div>

                        <!-- الأزرار -->
                        <div class="flex flex-wrap items-center gap-3 pt-2">
                            <button type="submit"
                                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-500 text-white px-6 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition shadow-lg shadow-blue-500/20 active:scale-95">
                                <i class="ri-save-line"></i>
                                <span>{{ $isEditingSocial ? 'تحديث الرابط / الرقم' : 'إضافة وسيلة اتصال' }}</span>
                            </button>

                            @if ($isEditingSocial)
                                <a href="{{ route('dashboard.page', ['page' => 'contact']) }}"
                                    class="inline-flex items-center gap-1 bg-gray-700 hover:bg-gray-600 text-white px-5 py-2.5 rounded-xl font-bold text-xs sm:text-sm transition">
                                    <i class="ri-close-line"></i>
                                    <span>إلغاء</span>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                <script>
                    function fillPreset(name, url, icon) {
                        document.getElementById('social_name').value = name;
                        document.getElementById('social_url').value = url;
                        document.getElementById('social_icon').value = icon;
                    }
                </script>

                <!-- قائمة وسائل التواصل المضافة (متجاوبة بنظام بطاقات للموبايل وجدول للكمبيوتر) -->
                <div class="dash-card">
                    <h3 class="text-lg font-bold text-white mb-4">وسائل التواصل وأرقام الهواتف المفعلة ({{ count($socialLinks) }})</h3>

                    <!-- عرض البطاقات للموبايل -->
                    <div class="grid grid-cols-1 gap-3.5 sm:hidden">
                        @forelse ($socialLinks as $link)
                            @php
                                $isWhatsApp = str_contains(strtolower($link->name), 'whatsapp') || str_contains(strtolower($link->name), 'واتساب');
                                $isPhoneCall = str_starts_with($link->url, 'tel:') || str_contains(strtolower($link->name), 'هاتف') || str_contains(strtolower($link->name), 'اتصال');
                                $cleanPhone = preg_replace('/[^0-9]/', '', $link->url);
                                if (!empty($cleanPhone) && !str_starts_with($cleanPhone, '967') && !str_starts_with($cleanPhone, '00967')) {
                                    $cleanPhone = '967' . ltrim($cleanPhone, '0');
                                }
                                $finalUrl = $isWhatsApp ? 'https://wa.me/' . $cleanPhone : ($isPhoneCall && !str_starts_with($link->url, 'tel:') ? 'tel:' . $cleanPhone : $link->url);
                            @endphp

                            <div class="bg-[#0e1422] p-4 rounded-2xl border border-white/10 space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-500/15 border border-blue-500/30 text-blue-400 text-lg">
                                            <i class="{{ $link->icon ?: 'ri-link' }}"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-white text-sm">{{ $link->name }}</h4>
                                            <span class="text-[11px] font-bold text-green-400 bg-green-500/20 px-2 py-0.5 rounded-md">مفعل</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-1.5">
                                        <a href="{{ route('dashboard.page', ['page' => 'contact', 'editSocial' => $link->id]) }}"
                                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600/20 text-blue-400 hover:bg-blue-600 hover:text-white transition text-xs">
                                            <i class="ri-edit-line"></i>
                                        </a>
                                        <form method="POST" action="{{ route('social.delete', $link->id) }}" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-600/20 text-red-400 hover:bg-red-600 hover:text-white transition text-xs">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div class="p-2.5 rounded-xl bg-[#090d16] border border-white/5">
                                    <a href="{{ $finalUrl }}" target="_blank" class="text-xs text-blue-400 hover:underline flex items-center justify-between font-mono break-all">
                                        <span>{{ $isWhatsApp ? 'wa.me/' . $cleanPhone : $link->url }}</span>
                                        <i class="ri-external-link-line shrink-0 mr-1"></i>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 text-slate-400 text-xs">لا توجد وسائل تواصل مضافة حالياً</div>
                        @endforelse
                    </div>

                    <!-- جدول الكمبيوتر -->
                    <div class="hidden sm:block overflow-x-auto">
                        <table class="w-full text-right border-collapse">
                            <thead>
                                <tr class="border-b border-white/10 text-slate-400 text-xs font-bold">
                                    <th class="p-3">الأيقونة</th>
                                    <th class="p-3">المنصة</th>
                                    <th class="p-3">الرابط / رقم الهاتف</th>
                                    <th class="p-3">الحالة</th>
                                    <th class="p-3">إجراءات</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-sm">
                                @forelse ($socialLinks as $link)
                                    @php
                                        $isWhatsApp = str_contains(strtolower($link->name), 'whatsapp') || str_contains(strtolower($link->name), 'واتساب');
                                        $isPhoneCall = str_starts_with($link->url, 'tel:') || str_contains(strtolower($link->name), 'هاتف') || str_contains(strtolower($link->name), 'اتصال');
                                        $cleanPhone = preg_replace('/[^0-9]/', '', $link->url);
                                        if (!empty($cleanPhone) && !str_starts_with($cleanPhone, '967') && !str_starts_with($cleanPhone, '00967')) {
                                            $cleanPhone = '967' . ltrim($cleanPhone, '0');
                                        }
                                        $finalUrl = $isWhatsApp ? 'https://wa.me/' . $cleanPhone : ($isPhoneCall && !str_starts_with($link->url, 'tel:') ? 'tel:' . $cleanPhone : $link->url);
                                    @endphp
                                    <tr class="hover:bg-white/5 transition">
                                        <td class="p-3 text-xl text-blue-400">
                                            <i class="{{ $link->icon ?: 'ri-link' }}"></i>
                                        </td>
                                        <td class="p-3 font-bold text-white">{{ $link->name }}</td>
                                        <td class="p-3 text-blue-400 font-mono text-xs">
                                            <a href="{{ $finalUrl }}" target="_blank" class="hover:underline inline-flex items-center gap-1">
                                                <span>{{ $isWhatsApp ? 'wa.me/' . $cleanPhone : $link->url }}</span>
                                                <i class="ri-external-link-line text-xs"></i>
                                            </a>
                                        </td>
                                        <td class="p-3">
                                            <span class="bg-green-500/20 text-green-400 px-2.5 py-0.5 rounded-full text-xs font-bold">
                                                متصل
                                            </span>
                                        </td>
                                        <td class="p-3 whitespace-nowrap">
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('dashboard.page', ['page' => 'contact', 'editSocial' => $link->id]) }}"
                                                    class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                                    تعديل
                                                </a>
                                                <form method="POST" action="{{ route('social.delete', $link->id) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذا الرابط؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-600 hover:bg-red-500 text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                                        حذف
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="p-8 text-center text-slate-400 text-xs">لا توجد وسائل تواصل مضافة حالياً</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif


            <!-- ================= 💬 7. قسم الرسائل الواردة (MESSAGES) ================= -->
            @if ($page == 'messages')
                @if (session('success'))
                    <div class="mb-5 rounded-2xl border border-green-500/30 bg-green-500/15 p-4 text-green-400 text-sm font-semibold flex items-center gap-2">
                        <i class="ri-checkbox-circle-fill text-lg"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="dash-card">
                    <div class="flex flex-wrap items-center justify-between gap-3 mb-6 pb-4 border-b border-white/10">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black text-white">صندوق الرسائل الواردة</h2>
                            <p class="text-xs sm:text-sm text-slate-400 mt-0.5">الرسائل واستفسارات العملاء المرسلة من نموذج التواصل في الموقع</p>
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1.5 rounded-xl bg-blue-500/15 border border-blue-500/30 text-blue-400 text-xs font-bold">
                                الإجمالي: {{ count($messages) }}
                            </span>
                            @if (!empty($unreadMessagesCount) && $unreadMessagesCount > 0)
                                <span class="px-3 py-1.5 rounded-xl bg-amber-500/20 border border-amber-500/30 text-amber-300 text-xs font-bold animate-pulse">
                                    غير مقروءة: {{ $unreadMessagesCount }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- عرض الرسائل بنظام بطاقات للموبايل (Mobile Cards View) -->
                    <div class="grid grid-cols-1 gap-3.5 md:hidden">
                        @forelse ($messages as $msg)
                            @php
                                $cleanPhone = preg_replace('/[^0-9]/', '', $msg->whatsapp ?? '');
                                if ($cleanPhone && !str_starts_with($cleanPhone, '967') && !str_starts_with($cleanPhone, '00967')) {
                                    $cleanPhone = '967' . ltrim($cleanPhone, '0');
                                }
                            @endphp

                            <div class="bg-[#0e1422] p-4 rounded-2xl border {{ !$msg->is_read ? 'border-blue-500/40 bg-blue-500/5' : 'border-white/10' }} space-y-3">
                                
                                <div class="flex items-start justify-between gap-2">
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <h4 class="font-bold text-white text-sm">{{ $msg->name }}</h4>
                                            @if (!$msg->is_read)
                                                <span class="bg-blue-600 text-white text-[10px] px-2 py-0.5 rounded-full font-bold">جديدة</span>
                                            @endif
                                        </div>
                                        <span class="text-[11px] text-slate-400 block mt-0.5">
                                            {{ $msg->created_at ? $msg->created_at->format('Y-m-d H:i') : '' }}
                                        </span>
                                    </div>

                                    <!-- أزرار التواصل السريع عبر الجوال -->
                                    <div class="flex items-center gap-1.5">
                                        @if (!empty($cleanPhone))
                                            <a href="https://wa.me/{{ $cleanPhone }}" target="_blank"
                                                title="محادثة واتساب"
                                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-green-500/20 text-green-400 hover:bg-green-600 hover:text-white transition">
                                                <i class="ri-whatsapp-fill text-sm"></i>
                                            </a>
                                            <a href="tel:+{{ $cleanPhone }}"
                                                title="اتصال هاتفي"
                                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-500/20 text-blue-400 hover:bg-blue-600 hover:text-white transition">
                                                <i class="ri-phone-fill text-sm"></i>
                                            </a>
                                        @endif
                                        <a href="mailto:{{ $msg->email }}"
                                            title="إرسال بريد"
                                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-500/20 text-slate-300 hover:bg-slate-600 hover:text-white transition">
                                            <i class="ri-mail-fill text-sm"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- نص وموضوع الرسالة -->
                                <div class="bg-[#090d16] p-3 rounded-xl border border-white/5 space-y-1">
                                    @if (!empty($msg->subject))
                                        <div class="text-xs font-bold text-blue-400">{{ $msg->subject }}</div>
                                    @endif
                                    <p class="text-xs text-slate-300 line-clamp-2 leading-relaxed">{{ $msg->message }}</p>
                                </div>

                                <!-- إجراءات الرسالة -->
                                <div class="flex items-center justify-between pt-2 border-t border-white/5">
                                    <button type="button"
                                        onclick="openMessageModal({{ json_encode([
                                            'name' => $msg->name,
                                            'email' => $msg->email,
                                            'whatsapp' => $msg->whatsapp,
                                            'cleanPhone' => $cleanPhone,
                                            'subject' => $msg->subject,
                                            'message' => $msg->message,
                                            'date' => $msg->created_at ? $msg->created_at->format('Y-m-d H:i') : '',
                                        ]) }})"
                                        class="inline-flex items-center gap-1 bg-blue-600 hover:bg-blue-500 text-white px-3.5 py-1.5 rounded-lg text-xs font-bold transition shadow-sm">
                                        <i class="ri-eye-line"></i>
                                        <span>عرض كامل الرسالة</span>
                                    </button>

                                    <div class="flex items-center gap-2">
                                        <form method="POST" action="{{ route('messages.toggleRead', $msg->id) }}">
                                            @csrf
                                            <button type="submit"
                                                class="flex h-7 items-center px-2.5 rounded-lg bg-white/5 text-slate-400 hover:text-white text-[11px] font-medium transition border border-white/5">
                                                {{ $msg->is_read ? 'تحديد كجديدة' : 'تمت القراءة' }}
                                            </button>
                                        </form>

                                        <form method="POST" action="{{ route('messages.delete', $msg->id) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذه الرسالة؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="flex h-7 w-7 items-center justify-center rounded-lg bg-red-500/15 text-red-400 hover:bg-red-600 hover:text-white transition text-xs">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12 text-slate-400 text-xs">لا توجد رسائل واردة حالياً</div>
                        @endforelse
                    </div>

                    <!-- جدول الرسائل للشاشات الكبيرة (Desktop Table) -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="w-full text-right border-collapse">
                            <thead>
                                <tr class="border-b border-white/10 text-slate-400 text-xs font-bold">
                                    <th class="p-3.5">المرسل</th>
                                    <th class="p-3.5">التواصل والهاتف</th>
                                    <th class="p-3.5">الموضوع والرسالة</th>
                                    <th class="p-3.5">التاريخ</th>
                                    <th class="p-3.5">الحالة</th>
                                    <th class="p-3.5">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-sm">
                                @forelse ($messages as $msg)
                                    @php
                                        $cleanPhone = preg_replace('/[^0-9]/', '', $msg->whatsapp ?? '');
                                        if ($cleanPhone && !str_starts_with($cleanPhone, '967') && !str_starts_with($cleanPhone, '00967')) {
                                            $cleanPhone = '967' . ltrim($cleanPhone, '0');
                                        }
                                    @endphp
                                    <tr class="hover:bg-white/5 transition {{ !$msg->is_read ? 'bg-blue-500/5' : '' }}">
                                        <td class="p-3.5 font-bold text-white whitespace-nowrap">{{ $msg->name }}</td>
                                        <td class="p-3.5 text-xs whitespace-nowrap">
                                            <div class="flex flex-col gap-1">
                                                <a href="mailto:{{ $msg->email }}" class="text-blue-400 hover:underline flex items-center gap-1">
                                                    <i class="ri-mail-line"></i>
                                                    <span>{{ $msg->email }}</span>
                                                </a>
                                                @if (!empty($msg->whatsapp))
                                                    <a href="https://wa.me/{{ $cleanPhone }}" target="_blank" class="text-green-400 hover:underline flex items-center gap-1 font-mono">
                                                        <i class="ri-whatsapp-line"></i>
                                                        <span>{{ $msg->whatsapp }}</span>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="p-3.5 max-w-xs text-xs">
                                            @if (!empty($msg->subject))
                                                <div class="font-bold text-white truncate mb-0.5">{{ $msg->subject }}</div>
                                            @endif
                                            <p class="text-slate-400 truncate">{{ $msg->message }}</p>
                                        </td>
                                        <td class="p-3.5 text-xs text-slate-400 whitespace-nowrap">
                                            {{ $msg->created_at ? $msg->created_at->format('Y-m-d H:i') : '—' }}
                                        </td>
                                        <td class="p-3.5 whitespace-nowrap">
                                            @if (!$msg->is_read)
                                                <span class="bg-blue-600 text-white px-2.5 py-0.5 rounded-full text-xs font-bold">جديدة</span>
                                            @else
                                                <span class="bg-slate-500/20 text-slate-400 px-2.5 py-0.5 rounded-full text-xs">مقروءة</span>
                                            @endif
                                        </td>
                                        <td class="p-3.5 whitespace-nowrap">
                                            <div class="flex items-center gap-2">
                                                <button type="button"
                                                    onclick="openMessageModal({{ json_encode([
                                                        'name' => $msg->name,
                                                        'email' => $msg->email,
                                                        'whatsapp' => $msg->whatsapp,
                                                        'cleanPhone' => $cleanPhone,
                                                        'subject' => $msg->subject,
                                                        'message' => $msg->message,
                                                        'date' => $msg->created_at ? $msg->created_at->format('Y-m-d H:i') : '',
                                                    ]) }})"
                                                    class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1.5 rounded-lg text-xs font-bold transition">
                                                    عرض
                                                </button>

                                                <form method="POST" action="{{ route('messages.toggleRead', $msg->id) }}">
                                                    @csrf
                                                    <button type="submit"
                                                        class="bg-gray-800 hover:bg-gray-700 text-gray-300 px-2.5 py-1.5 rounded-lg text-xs transition border border-white/5">
                                                        {{ $msg->is_read ? 'تحديد كجديدة' : 'تمت القراءة' }}
                                                    </button>
                                                </form>

                                                <form method="POST" action="{{ route('messages.delete', $msg->id) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذه الرسالة؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-600 hover:bg-red-500 text-white px-2.5 py-1.5 rounded-lg text-xs font-bold transition">
                                                        حذف
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="p-8 text-center text-slate-400 text-xs">لا توجد رسائل واردة حالياً</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 📱 نافذة عرض تفاصيل الرسالة المنبثقة (Modal) المتوافقة تماماً مع الهواتف -->
                <div id="messageModal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 hidden flex items-center justify-center p-3 sm:p-4">
                    <div class="bg-[#121a2c] border border-white/15 rounded-3xl max-w-lg w-full p-4 sm:p-6 shadow-2xl relative max-h-[90vh] flex flex-col">
                        
                        <div class="flex items-center justify-between border-b border-white/10 pb-3 mb-4">
                            <h3 class="text-base sm:text-lg font-black text-white flex items-center gap-2">
                                <i class="ri-mail-open-line text-blue-400"></i>
                                <span>تفاصيل الرسالة</span>
                            </h3>
                            <button onclick="closeMessageModal()"
                                class="flex h-8 w-8 items-center justify-center rounded-xl bg-white/5 hover:bg-white/10 text-slate-400 hover:text-white transition">
                                <i class="ri-close-line text-xl"></i>
                            </button>
                        </div>

                        <div class="space-y-3.5 text-right overflow-y-auto pr-1 no-scrollbar flex-1">
                            <div>
                                <span class="text-[11px] text-slate-400 font-semibold block">اسم المرسل:</span>
                                <span id="modalSender" class="text-sm sm:text-base font-black text-white"></span>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 bg-[#0e1422] p-3 rounded-2xl border border-white/10">
                                <div>
                                    <span class="text-[11px] text-slate-400 block">البريد الإلكتروني:</span>
                                    <a id="modalEmail" href="#" class="text-blue-400 text-xs font-mono hover:underline break-all"></a>
                                </div>
                                <div>
                                    <span class="text-[11px] text-slate-400 block">رقم الهاتف / الواتساب:</span>
                                    <a id="modalWhatsapp" href="#" target="_blank" class="text-green-400 text-xs font-mono hover:underline"></a>
                                </div>
                            </div>

                            <div class="flex items-center justify-between text-xs text-slate-400 bg-[#0e1422] px-3 py-2 rounded-xl border border-white/10">
                                <span>تاريخ الإرسال:</span>
                                <span id="modalDate" class="font-mono text-slate-300"></span>
                            </div>

                            <div>
                                <span class="text-[11px] text-slate-400 font-semibold block mb-1">الموضوع:</span>
                                <div id="modalSubject" class="text-xs sm:text-sm font-bold text-white bg-[#0e1422] p-2.5 rounded-xl border border-white/10"></div>
                            </div>

                            <div>
                                <span class="text-[11px] text-slate-400 font-semibold block mb-1">نص الرسالة:</span>
                                <div id="modalBody" class="p-3.5 bg-[#090d16] border border-white/10 rounded-2xl text-slate-200 text-xs sm:text-sm whitespace-pre-wrap leading-relaxed max-h-48 overflow-y-auto"></div>
                            </div>
                        </div>

                        <!-- أزرار التواصل المباشر في النافذة المنبثقة -->
                        <div class="mt-4 flex flex-wrap items-center justify-end gap-2 border-t border-white/10 pt-3">
                            <a id="modalWaBtn" href="#" target="_blank"
                                class="hidden inline-flex items-center gap-1.5 bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-xl text-xs font-bold transition shadow-sm">
                                <i class="ri-whatsapp-line"></i>
                                <span>محادثة واتساب</span>
                            </a>

                            <a id="modalCallBtn" href="#"
                                class="hidden inline-flex items-center gap-1.5 bg-sky-600 hover:bg-sky-500 text-white px-4 py-2 rounded-xl text-xs font-bold transition shadow-sm">
                                <i class="ri-phone-line"></i>
                                <span>اتصال</span>
                            </a>

                            <a id="modalReplyBtn" href="#"
                                class="inline-flex items-center gap-1.5 bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-xl text-xs font-bold transition shadow-sm">
                                <i class="ri-mail-send-line"></i>
                                <span>رد بالبريد</span>
                            </a>

                            <button onclick="closeMessageModal()"
                                class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-xl text-xs font-bold transition">
                                إغلاق
                            </button>
                        </div>
                    </div>
                </div>

                <script>
                function openMessageModal(data) {
                    document.getElementById('modalSender').innerText = data.name || '—';
                    
                    const emailEl = document.getElementById('modalEmail');
                    emailEl.innerText = data.email || '—';
                    emailEl.href = data.email ? 'mailto:' + data.email : '#';

                    const replyBtn = document.getElementById('modalReplyBtn');
                    replyBtn.href = data.email ? 'mailto:' + data.email + '?subject=رد: ' + encodeURIComponent(data.subject || '') : '#';

                    const waEl = document.getElementById('modalWhatsapp');
                    const waBtn = document.getElementById('modalWaBtn');
                    const callBtn = document.getElementById('modalCallBtn');

                    if (data.whatsapp && data.cleanPhone) {
                        waEl.innerText = data.whatsapp;
                        waEl.href = 'https://wa.me/' + data.cleanPhone;
                        waBtn.href = 'https://wa.me/' + data.cleanPhone;
                        waBtn.classList.remove('hidden');

                        callBtn.href = 'tel:+' + data.cleanPhone;
                        callBtn.classList.remove('hidden');
                    } else {
                        waEl.innerText = 'غير متوفر';
                        waEl.href = '#';
                        waBtn.classList.add('hidden');
                        callBtn.classList.add('hidden');
                    }

                    document.getElementById('modalDate').innerText = data.date || '—';
                    document.getElementById('modalSubject').innerText = data.subject || 'بدون عنوان';
                    document.getElementById('modalBody').innerText = data.message || '';

                    const modal = document.getElementById('messageModal');
                    modal.classList.remove('hidden');
                }

                function closeMessageModal() {
                    document.getElementById('messageModal').classList.add('hidden');
                }
                </script>
            @endif

        </main>
    </div>

    <!-- ================= 📱 شريط التنقل السفلي السريع للهواتف (Mobile Bottom Navigation Bar) ================= -->
    <nav class="fixed bottom-0 inset-x-0 bg-[#0e1422]/95 backdrop-blur-xl border-t border-white/10 z-40 lg:hidden px-2 py-1.5 flex items-center justify-around shadow-2xl">
        <a href="{{ route('dashboard.page', ['page' => 'home']) }}"
            class="flex flex-col items-center gap-0.5 p-1.5 rounded-xl {{ $page == 'home' ? 'text-blue-400 font-bold' : 'text-slate-400 hover:text-white' }} transition">
            <i class="ri-home-5-line text-lg"></i>
            <span class="text-[10px]">الرئيسية</span>
        </a>

        <a href="{{ route('dashboard.page', ['page' => 'projects']) }}"
            class="flex flex-col items-center gap-0.5 p-1.5 rounded-xl {{ $page == 'projects' ? 'text-blue-400 font-bold' : 'text-slate-400 hover:text-white' }} transition">
            <i class="ri-macbook-line text-lg"></i>
            <span class="text-[10px]">المشاريع</span>
        </a>

        <a href="{{ route('dashboard.page', ['page' => 'contact']) }}"
            class="flex flex-col items-center gap-0.5 p-1.5 rounded-xl {{ $page == 'contact' ? 'text-blue-400 font-bold' : 'text-slate-400 hover:text-white' }} transition">
            <i class="ri-phone-line text-lg"></i>
            <span class="text-[10px]">التواصل</span>
        </a>

        <a href="{{ route('dashboard.page', ['page' => 'messages']) }}"
            class="flex flex-col items-center gap-0.5 p-1.5 rounded-xl relative {{ $page == 'messages' ? 'text-blue-400 font-bold' : 'text-slate-400 hover:text-white' }} transition">
            <i class="ri-chat-3-line text-lg"></i>
            <span class="text-[10px]">الرسائل</span>
            @if (!empty($unreadMessagesCount) && $unreadMessagesCount > 0)
                <span class="absolute top-0.5 right-2 flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                </span>
            @endif
        </a>

        <button onclick="openMobileDrawer()"
            class="flex flex-col items-center gap-0.5 p-1.5 rounded-xl text-slate-400 hover:text-white transition">
            <i class="ri-menu-line text-lg"></i>
            <span class="text-[10px]">المزيد</span>
        </button>
    </nav>


    <!-- ================= ⚙️ سكريبت التحكم بالقائمة الجانبية في الهواتف ================= -->
    <script>
        function openMobileDrawer() {
            const drawer = document.getElementById('mobileDrawer');
            const overlay = document.getElementById('mobileDrawerOverlay');
            
            overlay.classList.remove('hidden');
            setTimeout(() => {
                overlay.classList.remove('opacity-0');
                overlay.classList.add('opacity-100');
                drawer.classList.remove('translate-x-full');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeMobileDrawer() {
            const drawer = document.getElementById('mobileDrawer');
            const overlay = document.getElementById('mobileDrawerOverlay');
            
            drawer.classList.add('translate-x-full');
            overlay.classList.remove('opacity-100');
            overlay.classList.add('opacity-0');
            setTimeout(() => {
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        }

        // إغلاق عند الضغط على Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeMobileDrawer();
                if (typeof closeMessageModal === 'function') {
                    closeMessageModal();
                }
            }
        });
    </script>

</body>
</html>
