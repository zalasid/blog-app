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
                    <div class="w-full max-w-xs">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <img src="{{$post->blog_image}}" alt="">
                        <form class="w-full max-w-sm" method="POST" action="{{ route('admin.posts.update', ['post' => $post->slug]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                          <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                              Title
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Title" type="text" placeholder="Title" name="title" value="{{ old('title', $post->title ?? null) }}" autofocus>
                          </div>
                          <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                              Content
                            </label>
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="content" name="content">{{ $post->content }}</textarea>
                          </div>
                          <div class="flex justify-center">
                            <div class="mb-3 w-full">
                                <x-label for="image" :value="__('Blog Image')" />
                              <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="image" name="image">
                            </div>
                          </div>
                          <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="show_publicly">
                              Show Publicly
                            </label>
                            <input type="checkbox" class="appearance-none checked:bg-gray-900 checked:border-transparent" value="1" {{  ((isset($post) && $post->show_publicly) ? ' checked' : '') }} name="show_publicly" id="show_publicly">
                          </div>
                          <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Update
                            </button>
                            <a class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('admin.posts') }}">
                                Cancel
                            </a>
                          </div>
                          <div class="flex items-center justify-between">
                            
                          </div>
                        </form>
                      </div>
                </div>
            </div>
        </div>        
    </div>
</x-Admin.admin-app-layout>
