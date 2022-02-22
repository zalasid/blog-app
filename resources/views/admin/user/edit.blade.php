<x-Admin.admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('admin.users') }}">{{ __('Users') }}</a>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-full max-w-xs">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <img class="inline object-cover w-96 h-96 mr-2 rounded-full" src="{{ $user->avatar }}" alt="Profile image"/>
                        <form class="w-full max-w-sm" method="POST" action="{{ route('admin.users.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                          <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                              Name
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Title" type="text" placeholder="Title" name="name" value="{{ old('name', $user->name) }}" autofocus>
                          </div>
                          <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                              Email
                            </label>
                            <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" value="{{ old('email', $user->email) }}">
                          </div>
                          <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="phone_number">
                              Phone Number
                            </label>
                            <input type="textbox" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                          </div>
                          <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="activated">
                              Is Activated?
                            </label>
                            <input type="checkbox" class="appearance-none checked:bg-gray-900 checked:border-transparent" value="1" {{  ((isset($user) && $user->activated) ? ' checked' : '') }} name="activated">
                          </div>
                          <div class="flex justify-center">
                            <div class="mb-3 w-96">
                              <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Avatar</label>
                              <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="avatar" name="image">
                            </div>
                          </div>
                          <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Update
                            </button>
                            <a class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('admin.users') }}">
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
