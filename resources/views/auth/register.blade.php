<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Vibe</title>
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
                    <a href="/login" class="text-indigo-600 hover:text-indigo-700 font-medium">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Registration Form -->
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 form-gradient p-8 sm:p-12 rounded-2xl shadow-xl">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Create your account
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Sign in
                    </a>
                </p>
            </div>
            <form method="POST" action="{{ route('register') }}" class="space-y-6" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="profile_image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                    <input id="profile_image" name="profile_image" type="file" accept="image/*"
                        class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <x-input-error :messages="$errors->get('profile_image')" class="mt-2" />
                </div>
                <!-- Name -->
                <div>
                    <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input id="firstname" name="firstname" type="text" :value="old('firstname')" required autofocus autocomplete="firstname"
                        class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                </div>

                <div>
                    <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input id="lastname" name="lastname" type="text" :value="old('lastname')" required autofocus autocomplete="lastname"
                        class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" :value="old('email')" required autocomplete="username"
                        class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="new-password"
                        class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                        class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Navigation shadow on scroll
        window.addEventListener('scroll', function () {
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
