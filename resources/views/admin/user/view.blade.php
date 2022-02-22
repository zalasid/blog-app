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
                    <img class="inline object-cover w-16 h-16 mr-2 rounded-full" src="{{ $user->avatar }}" alt="Profile image"/>
                    <p><strong>Name: </strong> {{ $user->name }}</p>
                    <p><strong>Email: </strong> {{ $user->email ?? 'N/A' }}</p>
                    <p><strong>Phone Number: </strong> {{ $user->phone_number ?? 'N/A' }}</p>
                    <p><strong>Total Posts: </strong> {{ $user->posts->count() }}</p>
                </div>
            </div>
        </div>        
    </div>
</x-Admin.admin-app-layout>
