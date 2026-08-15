<!DOCTYPE html>
<html lang="ar" dir="rtl" class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>إنشاء حساب</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.boxicons.com/fonts/basic/boxicons.min.css" rel="stylesheet">
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950 text-white px-4">

  <div class="w-full max-w-md bg-gray-900/80 backdrop-blur-xl border border-gray-800 rounded-3xl shadow-2xl p-8">

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
      @csrf

      <div class="text-center space-y-2">
        <h1 class="text-3xl font-bold">إنشاء حساب جديد</h1>
        <p class="text-gray-400 text-sm">مرحباً بك، الرجاء إدخال البيانات التالية</p>
      </div>

      @if ($errors->any())
        <div class="bg-red-500/10 border border-red-500 text-red-400 rounded-xl p-3 text-sm">
          <ul class="list-disc pr-5">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div>
        <label class="block mb-2 text-sm text-gray-300">اسم المستخدم</label>
        <div class="relative">
          <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            placeholder="أدخل اسم المستخدم"
            required
            class="w-full bg-gray-800/80 text-white placeholder-gray-500 border border-gray-700 rounded-xl py-3 pr-4 pl-12 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 transition"
          >
          <i class="bxr bxs-user absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl"></i>
        </div>
      </div>

      <div>
        <label class="block mb-2 text-sm text-gray-300">البريد الإلكتروني</label>
        <div class="relative">
          <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="أدخل البريد الإلكتروني"
            required
            class="w-full bg-gray-800/80 text-white placeholder-gray-500 border border-gray-700 rounded-xl py-3 pr-4 pl-12 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 transition"
          >
          <i class="bxr bxs-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl"></i>
        </div>
      </div>

      <div>
        <label class="block mb-2 text-sm text-gray-300">كلمة المرور</label>
        <div class="relative">
          <input
            type="password"
            name="password"
            placeholder="أدخل كلمة المرور"
            required
            class="w-full bg-gray-800/80 text-white placeholder-gray-500 border border-gray-700 rounded-xl py-3 pr-4 pl-12 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 transition"
          >
          <i class="bxr bxs-lock-open absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl"></i>
        </div>
      </div>

      <div>
        <label class="block mb-2 text-sm text-gray-300">تأكيد كلمة المرور</label>
        <div class="relative">
          <input
            type="password"
            name="password_confirmation"
            placeholder="أعد إدخال كلمة المرور"
            required
            class="w-full bg-gray-800/80 text-white placeholder-gray-500 border border-gray-700 rounded-xl py-3 pr-4 pl-12 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 transition"
          >
          <i class="bxr bxs-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl"></i>
        </div>
      </div>

      <button
        type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition shadow-lg shadow-blue-600/20"
      >
        إنشاء الحساب
      </button>

      <div class="text-center text-sm text-gray-400">
        لديك حساب بالفعل؟
        <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 font-medium">
          تسجيل الدخول
        </a>
      </div>

    </form>

  </div>

</body>
</html>