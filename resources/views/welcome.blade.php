<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vibe - Connect with Purpose</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
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
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="bg-white">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full bg-white/80 backdrop-blur-md z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="#" class="text-2xl font-bold gradient-text">Vibe</a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features" class="text-gray-600 hover:text-indigo-600 transition">Features</a>
                    <a href="#about" class="text-gray-600 hover:text-indigo-600 transition">About</a>
                    <a href="#contact" class="text-gray-600 hover:text-indigo-600 transition">Contact</a>
                    <a href="/login" class="text-indigo-600 hover:text-indigo-700 font-medium">Login</a>
                    <a href="/register" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                        Get Started
                    </a>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="text-gray-600 hover:text-indigo-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <div class="lg:w-1/2 mb-12 lg:mb-0">
                    <h1 class="text-5xl font-bold mb-6 leading-tight">
                        Connect with people who share your 
                        <span class="gradient-text">Vibe</span>
                    </h1>
                    <p class="text-xl text-gray-600 mb-8">
                        Join our community where meaningful connections happen. Create your profile, find like-minded people, and build lasting relationships.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/register" class="bg-indigo-600 text-white px-8 py-4 rounded-lg text-center hover:bg-indigo-700 transition">
                            Create Free Account
                        </a>
                        <a href="#features" class="border border-indigo-600 text-indigo-600 px-8 py-4 rounded-lg text-center hover:bg-indigo-50 transition">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="lg:w-1/2 relative">
                    <img src="/api/placeholder/600/500" alt="Vibe Platform Preview" class="rounded-2xl shadow-2xl floating" />
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Why Choose Vibe?</h2>
                <p class="text-xl text-gray-600">Everything you need to build meaningful connections</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Secure Platform</h3>
                    <p class="text-gray-600">Your privacy and security are our top priorities. Enjoy peace of mind with our advanced security features.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Smart Search</h3>
                    <p class="text-gray-600">Find the right connections quickly with our intelligent search system.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Real-time Notifications</h3>
                    <p class="text-gray-600">Stay updated with instant notifications for friend requests and interactions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-indigo-600 rounded-2xl p-12 text-center">
                <h2 class="text-3xl font-bold text-white mb-6">Ready to find your tribe?</h2>
                <p class="text-xl text-indigo-100 mb-8">Join thousands of others who have already found their community on Vibe.</p>
                <a href="/register" class="bg-white text-indigo-600 px-8 py-4 rounded-lg inline-block hover:bg-indigo-50 transition">
                    Get Started Now
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Product</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Features</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Security</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Pricing</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Company</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">About</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Blog</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Careers</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Support</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Help Center</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Contact</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Privacy</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Legal</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Terms</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Privacy</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600">Cookies</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-200 pt-8">
                <p class="text-gray-400 text-center">&copy; 2025 Vibe. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

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
