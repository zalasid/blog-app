<nav class="mt-0 w-full">
    <div class="container mx-auto flex items-center">
        <div class="flex w-1/2 pl-4 text-sm">
            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                @auth
                    <img class="inline object-cover w-16 h-16 mr-2 rounded-full" src="{{ Auth::user()->avatar }}" alt="Profile image"/>
                    <li class="mr-2">
                        <a class="inline-block py-2 px-2 text-black no-underline hover:underline" href="{{ route('dashboard') }}">DASHBOARD</a>
                    </li>
                    <li class="mr-2">
                        <a class="inline-block py-2 px-2 text-black no-underline hover:underline" href="{{ route('posts') }}">MY BLOGS</a>
                    </li>
                    <li class="mr-2">
                        <a class="inline-block py-2 px-2 text-black no-underline hover:underline" href="{{ route('posts.create') }}">ADD BLOG</a>
                    </li>
                    <li class="mr-2">
                        <a class="inline-block py-2 px-2 text-black no-underline hover:underline" href="{{ route('profile') }}">PROFILE</a>
                    </li>
                    <li class="mr-2">
                        <a class="inline-block py-2 px-2 text-black no-underline hover:underline" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <li class="mr-2">
                        <a class="inline-block py-2 px-2 text-black no-underline hover:underline" href="{{ route('login') }}">LOGIN</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="mr-2">
                            <a class="inline-block py-2 px-2 text-black no-underline hover:underline" href="{{ route('register') }}">REGISTER</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>