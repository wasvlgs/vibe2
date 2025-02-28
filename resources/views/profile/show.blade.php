<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Profile of ') }} <span class="font-bold">{{ $user->firstname }} {{ $user->lastname }}</span>
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <!-- User Information -->
                <div class="text-center mb-6">
                    <h1 class="text-3xl font-bold">{{ $user->firstname }} {{ $user->lastname }}</h1>
                    <p class="text-gray-700">{{ $user->email }}</p>
                    <p class="text-gray-600 italic">Joined on {{ $user->created_at->format('F d, Y') }}</p>
                </div>

                <!-- User's Posts -->
                <h2 class="text-2xl font-semibold mb-4">Posts</h2>

                @foreach($posts as $post)
                    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                        <div class="mb-4">
                            <strong>{{ $post->user->firstname }} {{ $post->user->lastname }}</strong>
                            <p class="text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                        <p class="text-gray-800">{{ $post->content }}</p>
                        @if($post->image)
                            <img src="{{ asset('storage/'.$post->image) }}" class="mt-3 rounded-lg max-w-full">
                        @endif

                        <!-- Like Button -->
                        <form action="{{ $post->isLikedByUser() ? route('posts.unlike', $post) : route('posts.like', $post) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-indigo-600 hover:underline">
                                {{ $post->isLikedByUser() ? '👎 Unlike' : '👍 Like' }} ({{ $post->likes->count() }})
                            </button>
                        </form>

                        <!-- Add Comment Form -->
                        <form action="{{ route('posts.comment', $post) }}" method="POST" class="mt-4">
                            @csrf
                            <div class="flex">
                                <input type="text" name="content" class="border p-2 rounded-lg flex-grow" placeholder="Add a comment..." required>
                                <button type="submit" class="ml-2 text-indigo-600 hover:underline">
                                    ➕ Add Comment
                                </button>
                            </div>
                        </form>

                        <!-- View Comments Button -->
                        <button onclick="openModal({{ $post->id }})" class="mt-2 text-indigo-600 hover:underline">
                            💬 View Comments ({{ $post->comments->count() }})
                        </button>
                    </div>

                    <!-- Comments Pop-Up -->
                    <div id="modal-{{ $post->id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
                        <div class="bg-white w-96 p-6 rounded-lg shadow-lg relative">
                            <h3 class="text-xl font-semibold mb-4">Comments</h3>
                            <div class="overflow-y-auto max-h-60 border p-4 rounded-lg bg-gray-100">
                                @if($post->comments->count() === 0)
                                    <p class="text-gray-600 italic">No comments yet. Be the first to comment!</p>
                                @else
                                    @foreach($post->comments as $comment)
                                        <div class="border-b pb-2 mb-2">
                                            <strong>{{ $comment->user->firstname }}:</strong> {{ $comment->content }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button onclick="closeModal({{ $post->id }})" class="mt-4 bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 absolute top-2 right-2">
                                ✖
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- JavaScript for Modal -->
    <script>
        function openModal(postId) {
            document.getElementById('modal-' + postId).classList.remove('hidden');
        }
        function closeModal(postId) {
            document.getElementById('modal-' + postId).classList.add('hidden');
        }
    </script>
</x-app-layout>
