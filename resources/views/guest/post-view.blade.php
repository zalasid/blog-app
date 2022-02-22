<x-app-layout>
    <x-slot name="title">Blog | {{ $post->title }}</x-slot>
    <x-slot name="content">
        <div class="w-full p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                <img src="https://source.unsplash.com/collection/225/800x600" class="h-auto w-full rounded-t pb-6">
                <p class="w-full text-gray-600 text-xs md:text-sm px-6">{{ $post->created_at->diffForHumans() }}</p>
                <div class="w-full font-bold text-xl text-gray-900 px-6">{{ $post->title }}</div>
                <p class="text-gray-800 font-serif text-base px-6 mb-5">
                    {{ $post->content }} 
                </p>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <img class="w-8 h-8 rounded-full mr-4 avatar" data-tippy-content="Author Name" src="{{ $post->author->avatar }}" alt="Avatar of Author">
                    <p class="text-gray-600 text-xs md:text-sm">{{ $post->author->name }}</p>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>