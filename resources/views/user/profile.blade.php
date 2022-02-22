<x-app-layout>
    <x-slot name="title">Profile | {{ $user->name }}</x-slot>
    <x-slot name="content">
        <div class="w-full p-6 flex flex-col flex-grow flex-shrink">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4 text-center" :errors="$errors" />
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="my-2">
                            <x-label for="title" :value="__('Name')" />
                            <x-input id="name" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="text" name="name" :value="old('name', $user->name ?? null)" autofocus />
                        </div>
                        <div class="my-2">
                            <x-label for="email" :value="__('Email')" />
                            <x-input id="email" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="email" name="email" :value="old('email', $user->email ?? null)"/>
                        </div>
                        <div class="my-2">
                            <x-label for="phone_number" :value="__('Phone Number')" />
                            <x-input id="phone_number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="phone_number" name="phone_number" :value="old('phone_number', $user->phone_number ?? null)"/>
                        </div>
                        <div class="flex justify-center">
                            <div class="mb-3 w-full">
                                <x-label for="image" :value="__('Avatar')" />
                            <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="image" name="image">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="flex-1 mt-4 md:mt-0 block md:inline-block appearance-none bg-green-500 text-white text-base font-semibold tracking-wider uppercase py-4 px-4 rounded shadow hover:bg-green-400">Update</button>
                            <a class="flex-1 mt-4 md:mt-0 block md:inline-block appearance-none bg-red-500 text-white text-base font-semibold tracking-wider uppercase py-4 px-4 rounded shadow hover:bg-red-400" href="/">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>