<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Vibe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gradient-text {
            background: linear-gradient(45deg, #4F46E5, #7C3AED);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .hero-gradient {
            background: radial-gradient(circle at top right, rgba(79, 70, 229, 0.1) 0%, transparent 60%),
                        radial-gradient(circle at bottom left, rgba(124, 58, 237, 0.1) 0%, transparent 60%);
        }

        .form-gradient {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.95));
        }
    </style>
</head>
<body class="min-h-screen hero-gradient">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full bg-white/80 backdrop-blur-md z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold gradient-text">Vibe</a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-gray-600 hover:text-indigo-600 transition">Help</a>
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-700 font-medium">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Login Section -->
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 form-gradient p-8 sm:p-12 rounded-2xl shadow-xl">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Welcome back
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Sign up for free
                    </a>
                </p>
            </div>

            <!-- Laravel Login Form -->
            <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Session Status -->
                @if (session('status'))
                    <div class="text-green-500 text-sm text-center">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required 
                            value="{{ old('email') }}"
                            class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg 
                            shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 
                            focus:border-indigo-500 transition">
                    </div>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required 
                            class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg 
                            shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 
                            focus:border-indigo-500 transition">
                    </div>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" 
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Forgot your password?
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Login Button -->
                <div>
                    <button type="submit" 
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent 
                        text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                        Sign in
                    </button>
                </div>
            </form>

            <!-- Social Logins -->
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or continue with</span>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-3">
                    <button class="w-full inline-flex justify-center py-3 px-4 border border-gray-300 rounded-lg 
                        shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        <span class="ml-2">Google</span>
                    </button>

                    <button class="w-full inline-flex justify-center py-3 px-4 border border-gray-300 rounded-lg 
                        shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.477 0 10c0 4.411 2.865 8.138 6.839 9.459.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.604-3.369-1.34-3.369-1.34-.454-1.155-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.831.092-.646.35-1.086.636-1.336-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0110 4.836c.85.004 1.705.115 2.504.337 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.579.688.481C17.137 18.135 20 14.411 20 10c0-5.523-4.477-10-10-10z" clip-rule="evenodd"/>
                        </svg>
                        <span class="ml-2">GitHub</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Navigation shadow on scroll
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 0) {
                nav.classList.add('shadow-sm');
            } else {
                nav.classList.remove('shadow-sm');
            }
        });
    </script>
</body>
</html>
