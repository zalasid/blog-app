<x-app-layout>
    <x-slot name="title">My Blogs</x-slot>
    <x-slot name="content">
        <x-user.post-list :posts="$posts" :showControls="['view', 'edit', 'delete']"></x-user.post-list>
    </x-slot>
</x-app-layout>