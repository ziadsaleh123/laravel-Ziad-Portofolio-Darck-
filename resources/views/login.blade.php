<!DOCTYPE html>
<html lang="ar" dir="rtl" class="dark">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل الدخول</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-950 text-white px-4">

<div class="w-full max-w-md bg-gray-900/90 border border-gray-800 rounded-2xl shadow-2xl p-8">

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <h1 class="text-3xl font-bold text-center">
            تسجيل الدخول
        </h1>

        <p class="text-center text-gray-400 text-sm">
            مرحباً بك مجدداً، الرجاء إدخال بيانات حسابك
        </p>

        <!-- عرض الأخطاء -->
        @if ($errors->any())
            <div class="bg-red-500/10 border border-red-500 text-red-400 rounded-xl p-3 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- رسالة نجاح بعد التسجيل -->
        @if (session('success'))
            <div class="bg-green-500/10 border border-green-500 text-green-400 rounded-xl p-3 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- البريد الإلكتروني -->
        <div class="relative">
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="البريد الإلكتروني"
                required
                class="w-full bg-gray-800 text-white placeholder-gray-400 border border-gray-700 rounded-xl py-3 pr-4 pl-12 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 transition"
            />

            <i class="bx bxs-user absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl"></i>
        </div>

        <!-- كلمة المرور -->
        <div class="relative">
            <input
                id="password"
                type="password"
                name="password"
                placeholder="كلمة المرور"
                required
                class="w-full bg-gray-800 text-white placeholder-gray-400 border border-gray-700 rounded-xl py-3 pr-12 pl-12 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 transition"
            />

            <!-- أيقونة القفل -->
            <i class="bx bxs-lock-open absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl"></i>

            <!-- زر إظهار كلمة المرور -->
            <button
                type="button"
                id="togglePassword"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white transition"
            >
                <i id="eyeIcon" class="bx bx-hide text-xl"></i>
            </button>
        </div>

        <!-- زر الدخول -->
        <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition shadow-lg shadow-blue-600/20"
        >
            دخول
        </button>

        <!-- رابط التسجيل -->
        <div class="text-center text-sm text-gray-400">
            ليس لديك حساب؟
            <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 font-medium">
                إنشاء حساب
            </a>
        </div>

    </form>

</div>

<!-- JavaScript لإظهار وإخفاء كلمة المرور -->
<script>
    const password = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', function () {
        if (password.type === 'password') {
            password.type = 'text';
            eyeIcon.classList.remove('bx-hide');
            eyeIcon.classList.add('bx-show');
        } else {
            password.type = 'password';
            eyeIcon.classList.remove('bx-show');
            eyeIcon.classList.add('bx-hide');
        }
    });
</script>

</body>
</html>