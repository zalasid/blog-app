<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="content">
        <x-user.post-list :posts="$posts" :showControls="['view']"></x-user.post-list>
    </x-slot>
</x-app-layout>