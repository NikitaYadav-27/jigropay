<!DOCTYPE html>
<html lang="en" class="h-full bg-gradient-to-br from-slate-50 via-white to-brand-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Jigropay</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif']
                    },
                    colors: {
                        brand: {
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            200: '#ddd6fe',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                            800: '#5b21b6',
                            900: '#4c1d95',
                        },
                    },
                },
            },
        };
    </script>
</head>

<body class="h-full font-sans text-slate-800 antialiased flex items-center justify-center px-4">

    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-brand-200 rounded-full blur-3xl opacity-40"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-brand-100 rounded-full blur-3xl opacity-40"></div>
    </div>

    <div class="relative w-full max-w-md">

        <div class="bg-white/90 backdrop-blur-xl shadow-2xl rounded-3xl p-10 ring-1 ring-slate-200">

            <div class="flex flex-col items-center">
                <img class="h-12 w-auto mb-4" src="{{ asset('logo.png') }}" alt="Jigropay">

                <h2 class="text-2xl font-bold text-slate-900">
                    Welcome back
                </h2>
                <p class="text-sm text-slate-500 mt-1">
                    Sign in to continue to your dashboard
                </p>
            </div>

            @if ($errors->any())
                <div class="mt-6 rounded-xl bg-red-50 border border-red-100 p-4">
                    <ul class="text-sm text-red-700 space-y-1 list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="mt-6 space-y-5" action="{{ route('login') }}" method="POST">
                @csrf

                <div>
                    <label class="text-sm font-medium text-slate-700">Email</label>
                    <input
                        name="email"
                        type="email"
                        required
                        value="{{ old('email') }}"
                        class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-600 focus:border-brand-600"
                        placeholder="you@example.com"
                    >
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-700">Password</label>
                    <input
                        name="password"
                        type="password"
                        required
                        class="mt-1 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-brand-600 focus:border-brand-600"
                        placeholder="••••••••"
                    >
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 text-slate-600">
                        <input type="checkbox" name="remember" class="rounded border-slate-300 text-brand-600 focus:ring-brand-600">
                        Remember me
                    </label>
                </div>

                <button
                    type="submit"
                    class="w-full relative overflow-hidden bg-gradient-to-r from-brand-700 to-brand-600 hover:from-brand-600 hover:to-brand-500 text-white font-semibold py-3 rounded-xl shadow-lg transition-all duration-200"
                >
                    Sign in
                </button>
            </form>

            <p class="text-center text-xs text-slate-400 mt-6">
                Secure login powered by Jigropay
            </p>

        </div>
    </div>
</body>
</html>