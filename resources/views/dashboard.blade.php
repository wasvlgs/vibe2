<x-app-layout>
    <div class="bg-gray-50 min-h-screen">
        <!-- Instagram-style top navigation bar -->

        <!-- Main content -->
        <div class="pt-16 pb-20">
            <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Stories section (visual only) -->
                <div class="py-4 overflow-x-auto">
                    <div class="flex space-x-4">
                        <div class="flex flex-col items-center">
                            <div class="w-16 h-16 rounded-full bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 p-0.5">
                                <div class="bg-white rounded-full p-0.5 h-full w-full">
                                    <img class="h-full w-full rounded-full object-cover border border-white" 
                                         src="https://ui-avatars.com/api/?name=Your&background=random" alt="Your Story">
                                </div>
                            </div>
                            <span class="text-xs mt-1">Your Story</span>
                        </div>
                        <!-- Example story circles (visual only) -->
                        @foreach(['Sarah', 'Mike', 'Jane', 'Alex', 'Taylor'] as $name)
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 rounded-full bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 p-0.5">
                                    <div class="bg-white rounded-full p-0.5 h-full w-full">
                                        <img class="h-full w-full rounded-full object-cover" 
                                             src="https://ui-avatars.com/api/?name={{ $name }}&background=random" alt="{{ $name }}">
                                    </div>
                                </div>
                                <span class="text-xs mt-1">{{ $name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Create Post Form - Hide by default, show on button click -->
                <div id="create-post-container" class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6 hidden">
                    <div class="p-4 border-b border-gray-200">
                        <h2 class="text-center font-medium">Create new post</h2>
                    </div>
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                        @csrf
                        <textarea name="content" class="w-full p-2 border-0 focus:ring-0 resize-none text-sm" 
                                  placeholder="Write a caption..." required></textarea>
                        <div class="flex items-center justify-between border-t border-gray-200 pt-3">
                            <label class="flex items-center cursor-pointer text-blue-500 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Add Photo</span>
                                <input type="file" name="image" class="hidden">
                            </label>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded-md text-sm font-medium">
                                Share
                            </button>
                        </div>
                    </form>
                </div>

                <!-- New Post Button -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6 p-3">
                    <button id="new-post-button" class="w-full flex items-center justify-center text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span class="font-medium">Create new post</span>
                    </button>
                </div>

                <!-- Posts Feed -->
                @foreach($posts as $post)
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
                        <!-- Post Header -->
                        <div class="p-3 flex items-center">
                            <img class="h-8 w-8 rounded-full mr-3 object-cover" 
                                 src="https://ui-avatars.com/api/?name={{ $post->user->firstname }}&background=random" 
                                 alt="{{ $post->user->firstname }}">
                            <a href="{{ route('profile.show', $post->user) }}" class="font-semibold text-sm hover:underline">
                                {{ $post->user->firstname }} {{ $post->user->lastname }}
                            </a>
                            <span class="ml-auto text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                        </div>

                        <!-- Post Image -->
                        @if($post->image)
                            <div class="bg-gray-100 flex items-center justify-center">
                                <img src="{{ asset('storage/'.$post->image) }}" class="max-w-full max-h-96 object-contain" alt="Post image">
                            </div>
                        @endif

                        <!-- Post Actions -->
                        <div class="p-3">
                            <div class="flex items-center space-x-4">
                                <form action="{{ $post->isLikedByUser() ? route('posts.unlike', $post) : route('posts.like', $post) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="flex items-center focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 {{ $post->isLikedByUser() ? 'text-red-500 fill-current' : 'text-gray-500' }}" 
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </form>
                                <button onclick="openModal({{ $post->id }})" class="flex items-center focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Likes count -->
                            <div class="mt-2 text-sm font-semibold">
                                {{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}
                            </div>

                            <!-- Caption -->
                            <div class="mt-1 text-sm">
                                <span class="font-semibold">{{ $post->user->firstname }}</span>
                                <span>{{ $post->content }}</span>
                            </div>

                            <!-- View all comments link -->
                            @if($post->comments->count() > 0)
                                <button onclick="openModal({{ $post->id }})" class="mt-1 text-sm text-gray-500">
                                    View all {{ $post->comments->count() }} {{ Str::plural('comment', $post->comments->count()) }}
                                </button>
                            @endif

                            <!-- Add comment form -->
                            <form action="{{ route('posts.comment', $post) }}" method="POST" class="mt-2 flex">
                                @csrf
                                <input type="text" name="content" 
                                       class="flex-grow text-sm border-0 focus:ring-0 p-0" 
                                       placeholder="Add a comment..." required>
                                <button type="submit" class="ml-2 text-blue-500 font-semibold text-sm">Post</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Mobile-style bottom navigation (visual only) -->
        <div class="fixed bottom-0 w-full bg-white border-t border-gray-200 p-3">
            <div class="max-w-5xl mx-auto flex justify-around">
                <button class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-14 0l2 2m0 0l7 7 7-7m-14 0l2-2" />
                    </svg>
                </button>
                <button class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
                <button id="mobile-new-post-button" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </button>
                <button class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
                <button class="focus:outline-none">
                    <img class="h-6 w-6 rounded-full object-cover" 
                         src="https://ui-avatars.com/api/?name={{ Auth::user()->firstname }}&background=random" alt="Profile">
                </button>
            </div>
        </div>

        <!-- Comments Modal (Improved design) -->
        @foreach($posts as $post)
            <div id="modal-{{ $post->id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex justify-center items-center">
                <div class="bg-white w-full max-w-md rounded-lg shadow-lg relative max-h-[80vh] flex flex-col">
                    <div class="border-b border-gray-200 p-4 flex items-center">
                        <h3 class="text-center font-medium flex-grow">Comments</h3>
                        <button onclick="closeModal({{ $post->id }})" class="focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="overflow-y-auto flex-grow p-4">
                        @if($post->comments->count() === 0)
                            <p class="text-gray-500 text-center">No comments yet.</p>
                        @else
                            @foreach($post->comments as $comment)
                                <div class="mb-4 flex">
                                    <img class="h-8 w-8 rounded-full mr-3 object-cover" 
                                         src="https://ui-avatars.com/api/?name={{ $comment->user->firstname }}&background=random" 
                                         alt="{{ $comment->user->firstname }}">
                                    <div>
                                        <span class="font-semibold text-sm">{{ $comment->user->firstname }}</span>
                                        <p class="text-sm">{{ $comment->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="border-t border-gray-200 p-3">
                        <form action="{{ route('posts.comment', $post) }}" method="POST" class="flex">
                            @csrf
                            <input type="text" name="content" 
                                   class="flex-grow text-sm border rounded-full px-4 py-1 focus:border-gray-300 focus:ring-0" 
                                   placeholder="Add a comment..." required>
                            <button type="submit" class="ml-2 text-blue-500 font-semibold text-sm">Post</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- JavaScript for Modal and Post Creation -->
    <script>
        // Handle modals
        function openModal(postId) {
            document.getElementById('modal-' + postId).classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeModal(postId) {
            document.getElementById('modal-' + postId).classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        // Handle create post form
        document.addEventListener('DOMContentLoaded', function() {
            const newPostButton = document.getElementById('new-post-button');
            const mobileNewPostButton = document.getElementById('mobile-new-post-button');
            const createPostContainer = document.getElementById('create-post-container');

            function toggleCreatePost() {
                createPostContainer.classList.toggle('hidden');
                // Scroll to the create post form if it's visible
                if (!createPostContainer.classList.contains('hidden')) {
                    createPostContainer.scrollIntoView({ behavior: 'smooth' });
                }
            }

            if (newPostButton) {
                newPostButton.addEventListener('click', toggleCreatePost);
            }
            
            if (mobileNewPostButton) {
                mobileNewPostButton.addEventListener('click', toggleCreatePost);
            }

            // Close modals when clicking outside
            document.addEventListener('click', function(event) {
                const modals = document.querySelectorAll('[id^="modal-"]');
                modals.forEach(function(modal) {
                    if (event.target === modal) {
                        modal.classList.add('hidden');
                        document.body.classList.remove('overflow-hidden');
                    }
                });
            });
        });
    </script>
</x-app-layout>