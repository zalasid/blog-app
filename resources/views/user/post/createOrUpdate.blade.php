<x-app-layout>
    <x-slot name="title">{{ (!empty($post)) ? 'Edit Blog | ' . $post->title : 'Add Blog' }}</x-slot>
    <x-slot name="content">
        <div class="w-full p-6 flex flex-col flex-grow flex-shrink">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4 text-center" :errors="$errors" />
                    <h4 class="font-medium leading-tight text-2xl mt-0 mb-2 text-gray-600 text-center">
                        {{ (!empty($post)) ? 'Edit Blog' : 'Add Blog' }}
                    </h4>
                    @if (!empty($post))
                        <form method="POST" action="{{ route('posts.update', ['post' => $post->slug]) }}" enctype="multipart/form-data">
                        @method('PATCH')
                    @else
                        <form method="POST" action="{{ route('posts') }}" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="my-2">
                        <x-label for="title" :value="__('Title')" />
                        <x-input id="title" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="title" :value="old('title', $post->title ?? null)" autofocus />
                    </div>
                    <div class="my-2">
                        <x-label for="content" :value="__('Content')" />
                        <textarea rows="10" id="content" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="content">{{ old('content', $post->content ?? null) }}</textarea>
                    </div>
                    <div class="flex justify-center">
                        <div class="mb-3 w-full">
                            <x-label for="image" :value="__('Blog Image')" />
                          <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="image" name="image">
                        </div>
                    </div>
                        @if (!empty($post))
                        <div class="block font-medium text-sm text-gray-700 my-2">{{ __('Show Publicly') }} <input type="checkbox" name="show_publicly" id="show_publicly" value="1" {{  ((isset($post) && $post->show_publicly) ? ' checked' : '') }}></div> 
                        @else
                            <div class="block font-medium text-sm text-gray-700 my-2">{{ __('Show Publicly') }} <input type="checkbox" name="show_publicly" id="show_publicly" value="1" checked></div>
                        @endif
                    <div class="text-center">
                        <button type="submit" class="flex-1 mt-4 md:mt-0 block md:inline-block appearance-none bg-green-500 text-white text-base font-semibold tracking-wider uppercase py-4 px-4 rounded shadow hover:bg-green-400">{{ !empty($post) ? 'Update' : 'Save' }}</button>
                        <a class="flex-1 mt-4 md:mt-0 block md:inline-block appearance-none bg-red-500 text-white text-base font-semibold tracking-wider uppercase py-4 px-4 rounded shadow hover:bg-red-400" href="{{ route('posts') }}">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>