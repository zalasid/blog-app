<x-app-layout>
    <x-slot name="title">Blog App</x-slot>
    <x-slot name="content">
        @if ($posts->count())
            @foreach ($posts as $post)
                <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                        <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                            <img src="{{ $post->blog_image }}" class="h-64 w-full rounded-t pb-6">
                            <p class="w-full text-gray-600 text-xs md:text-sm px-6">{{ $post->created_at->diffForHumans() }}</p>
                            <div class="w-full font-bold text-xl text-gray-900 px-6">
                                <a href="{{ route('guest.posts.view', ['post' => $post->slug]) }}">
                                    {{ $post->title }}
                                </a>
                            </div>
                            <p class="text-gray-800 font-serif text-base px-6 mb-5">
                                {{ Str::limit($post->content, 200, $end = '...') }}
                            </p>
                        </a>
                    </div>
                    <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
                        <div class="flex items-center justify-between">
                            <img class="w-10 h-10 rounded-full mr-4 avatar" data-tippy-content="Author Name" src="{{ $post->author->avatar }}" alt="Avatar of Author">
                            <p class="text-gray-600 text-xs md:text-sm">{{ $post->author->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="container p-6">
                {{ $posts->links() }}
            </div>
        @else
        <div class="container p-6 text-center">
            No Blog Found
        </div>
        @endif
    </x-slot>
</x-app-layout>