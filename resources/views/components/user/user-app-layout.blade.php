<div class="rounded-t-xl overflow-hidden p-10">
    <table class="table-auto">
        <thead>
        <tr>
            <th class="px-4 py-2">Title</th>
            <th class="px-4 py-2">Author</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                <tr>
                <td class="border px-4 py-2 font-medium">{{ $post->title }}</td>
                <td class="border px-4 py-2 font-medium">{{ $post->author->name }}</td>
                <td class="border px-4 py-2 font-medium">
                    <a href="{{ route('posts.edit', ['post' => $post->slug]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <a href="{{ route('posts.view', ['post' => $post->slug]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">View</a>
                    <a href="#" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                        Delete
                    </a>
                    <form id="delete-form" action="{{ route('posts.delete', ['post' => $post->slug]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </td>
                </tr>
            @endforeach
        @else
        <tr>
            <td class="border px-4 py-2 font-medium" colspan="3">
                No Blog Found
            </td>
        </tr>
        @endif
        </tbody>
    </table>
</div>