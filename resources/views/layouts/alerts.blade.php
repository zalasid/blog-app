@if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif
@if (session('message'))
    <div class="bg-blue-100 border border-blue-100 text-blue-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Message!</strong>
        <span class="block sm:inline">{{ session('message') }}</span>
    </div>
@endif