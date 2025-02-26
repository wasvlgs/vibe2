<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-white leading-tight">
                {{ __('Connect with Others') }}
            </h2>
            <div class="relative">
                <input type="text" placeholder="Search users..." class="pl-10 pr-4 py-2 rounded-full text-sm bg-white/20 text-white placeholder-white/70 border-0 focus:ring-2 focus:ring-white/50 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-2.5 text-white/70" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-r from-indigo-600 via-purple-600 to-purple-700 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <!-- Friend Request Section with animation -->
            @if (!$friendRequests->isEmpty())
            <div class="p-6 bg-white shadow-xl rounded-2xl transform transition duration-300 hover:scale-[1.01]">
                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-2xl font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Friend Requests
                    </h3>
                    <span class="bg-purple-100 text-purple-800 text-sm font-medium px-3 py-1 rounded-full">{{ $friendRequests->count() }} pending</span>
                </div>
                
                <div class="space-y-4">
                    @foreach ($friendRequests as $friendRequest)
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition duration-200">
                            <div class="flex items-center">
                                <div class="relative">
                                    <img src="{{ asset('uploads/profile_images/' . $friendRequest->sender->profile_photo) }}" 
                                        alt="Profile Image" 
                                        class="w-20 h-20 rounded-full object-cover border-4 border-white shadow-md">
                                    <div class="absolute -bottom-1 -right-1 h-5 w-5 bg-green-400 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-4">
                                    <p class="font-semibold text-lg text-gray-800">{{ $friendRequest->sender->firstname }} {{ $friendRequest->sender->lastname }}</p>
                                    <p class="text-sm text-gray-500">Sent request {{ $friendRequest->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <form method="POST" action="{{ route('users.acceptRequest', $friendRequest->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-indigo-600 text-white py-2 px-5 rounded-lg hover:bg-indigo-700 transition duration-200 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        Accept
                                    </button>
                                </form>
                                
                                <form method="POST" action="{{ route('users.declineRequest', $friendRequest->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-gray-200 text-gray-700 py-2 px-5 rounded-lg hover:bg-gray-300 transition duration-200">
                                        Decline
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- All Users Section -->
            <div class="p-6 bg-white shadow-xl rounded-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Discover People
                    </h3>
                    <div class="flex space-x-2">
                        <button class="bg-gray-100 text-gray-700 py-1.5 px-4 rounded-lg hover:bg-gray-200 transition duration-200 text-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Filter
                        </button>
                        <button class="bg-gray-100 text-gray-700 py-1.5 px-4 rounded-lg hover:bg-gray-200 transition duration-200 text-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4" />
                            </svg>
                            Sort
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($users as $user)
                    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 overflow-hidden border border-gray-100">
                        <!-- Card Header with Background -->
                        <div class="h-24 bg-gradient-to-r from-blue-500 to-indigo-600 relative">
                            <div class="absolute -bottom-10 left-1/2 transform -translate-x-1/2">
                                <img src="{{ asset('uploads/profile_images/' . $user->profile_photo) }}" 
                                     alt="Profile Image" 
                                     class="w-20 h-20 rounded-full object-cover border-4 border-white shadow-md">
                            </div>
                        </div>
                        
                        <!-- Card Body -->
                        <div class="pt-12 pb-6 px-4 text-center">
                            <h4 class="font-bold text-xl text-gray-800 mb-1">{{ $user->firstname }} {{ $user->lastname }}</h4>
                            {{-- <p class="text-gray-500 text-sm mb-4">@{!! strtolower($user->firstname . $user->lastname) !!}</p> --}}
                            
                            @if ($user->id !== auth()->id())
                                @php
                                    $existingRequest = \App\Models\FriendRequest::where(function ($query) use ($user) {
                                        $query->where('sender_id', auth()->id())
                                              ->where('receiver_id', $user->id);
                                    })->orWhere(function ($query) use ($user) {
                                        $query->where('sender_id', $user->id)
                                              ->where('receiver_id', auth()->id());
                                    })->first();
                                @endphp
                                
                                @if ($existingRequest)
                                    @if ($existingRequest->status === 'pending')
                                        @if ($existingRequest->sender_id === auth()->id())
                                            <button disabled class="bg-gray-100 text-gray-500 py-2 px-4 rounded-lg w-full flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Request Sent
                                            </button>
                                        @else
                                            <form method="POST" action="{{ route('users.acceptRequest', $existingRequest->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 w-full transition duration-200 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    Accept Request
                                                </button>
                                            </form>
                                        @endif
                                    @elseif ($existingRequest->status === 'accepted')
                                        <div class="bg-green-50 text-green-700 py-2 px-4 rounded-lg w-full flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Friends
                                        </div>
                                    @endif
                                @else
                                    <form method="POST" action="{{ route('users.sendFriendRequest', $user->id) }}">
                                        @csrf
                                        <button type="submit" class="bg-purple-600 text-white py-2 px-4 rounded-lg hover:bg-purple-700 w-full transition duration-200 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                            </svg>
                                            Add Friend
                                        </button>
                                    </form>
                                @endif
                            @else
                                <div class="bg-blue-50 text-blue-700 py-2 px-4 rounded-lg w-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Your Profile
                                </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            1
                        </a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            2
                        </a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            3
                        </a>
                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                            ...
                        </span>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            8
                        </a>
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>