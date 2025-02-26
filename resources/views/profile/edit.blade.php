<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-indigo-500 to-purple-600 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-white shadow-xl rounded-2xl">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Update Profile Information</h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 bg-white shadow-xl rounded-2xl">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Change Password</h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
