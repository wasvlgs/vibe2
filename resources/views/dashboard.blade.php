<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Welcome to Your Dashboard, ') }} <span class="font-bold">{{ Auth::user()->firstname }}!</span>
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-indigo-500 to-purple-600 text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-3xl font-bold mb-6">You're logged in and ready to explore!</h1>
                    <p class="text-xl text-gray-700 mb-8">
                        Manage your profile, connect with friends, and stay updated with what's happening around you in Vibe.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/profile" class="bg-indigo-600 text-white px-8 py-4 rounded-lg text-center hover:bg-indigo-700 transition">
                            Edit Profile
                        </a>
                        <a href="#friends" class="border border-indigo-600 text-indigo-600 px-8 py-4 rounded-lg text-center hover:bg-indigo-50 transition">
                            Friends & Requests
                        </a>
                        <a href="#features" class="border border-indigo-600 text-indigo-600 px-8 py-4 rounded-lg text-center hover:bg-indigo-50 transition">
                            Explore Features
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
