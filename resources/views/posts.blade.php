<x-layout > <!-- See $slot at resources\views\components\layout.blade.php -->

    {{-- This is the homepage/the center of this project --}}

    <div class="bg-white rounded  w-full max-w-md">
        <header>

            <h1 class="text-3xl font-semibold mb-4 whitespace-nowrap" >Forms and Authentication Project</h1>
            <hr>
            <nav >
                <ul>
                    {{-- If the user is authenticated/logged in --}}
                    @auth
                        {{-- Greeting --}}
                        <li class="text-2xl mt-4 font-semibold mb-4 text-left" style="color: #007BFF">
                            Hello, {{ auth()->user()->name }}!
                        </li>
                        {{-- Logout option --}}
                        <li class="text-2xl mt-4 font-semibold mb-4 text-left" style="color: #007BFF">
                            <a href="/logout">Logout!</a>
                        </li>
                    {{-- If the user is not logged in  --}}
                    @else
                        {{-- Log in option --}}
                        <li class="text-2xl mt-4 font-semibold mb-4 text-left" style="color: #007BFF">
                            <a href="/login">Log in</a>
                        </li>
                        {{-- Register option --}}
                        <li class="text-2xl font-semibold mb-4 text-left" style="color: #007BFF">
                            <a href="/register">Register</a>
                        </li>
                    @endauth
                </ul>
            </nav>
            <hr>
        </header>
    </div>

   
    <div class="mt-5">
        <h2 class="text-2xl font-semibold mb-4" >
        Below you will find the posts
        </h2>
    </div>


    {{-- Displaying all posts --}}
    @foreach ($posts as $post)

    <div>
        <article class="">
                <h1 class="mb-4">
                <!-- Link to the post, via its id. See the second route-->
                    <a href="/posts/{{ $post->id }}">
                    <!-- The title -->
                    {!! $post->title!!}
                    </a>
                </h1>
        </article>
    </div>

    @endforeach

</x-layout>









