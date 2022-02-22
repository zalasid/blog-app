<x-Admin.admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($users->count())
                        @foreach ($users as $user)
                        <div class="mb-2">
                            <img class="inline object-cover w-16 h-16 mr-2 rounded-full" src="{{ $user->avatar }}" alt="Profile image"/>
                            <strong>{{ $user->name }}</strong> |
                            <a href="{{ route('admin.users.view', ['user' => $user->id]) }}">View</a> |
                            <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}">Edit</a> |
                            <a href="#" class="text-sm text-gray-700 dark:text-gray-500 underline" onclick="event.preventDefault(); document.getElementById('delete-form-{{$user->id}}').submit();">
                                Delete
                            </a>
                            <form id="delete-form-{{$user->id}}" action="{{ route('admin.users.delete', ['user' => $user->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                        @endforeach
                        {{ $users->links() }}
                    @else
                        <strong>No User Found</strong>
                    @endif
                </div>
            </div>
        </div>        
    </div>
</x-Admin.admin-app-layout>
