<x-Admin.admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('admin.posts') }}">{{ __('Posts') }}</a>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <img src="{{$post->blog_image}}" alt="{{$post->slug}}">
                    <strong>{{ $post->title }}</strong> | 
                    <small>Author: {{ $post->author->name }}</small> | 
                    <small>{{ $post->created_at->diffForHumans() }}</small>
                    <p class="mt-8">
                        {{ $post->content }}
                    </p>
                </div>
            </div>
        </div>        
    </div>
</x-Admin.admin-app-layout>
