<x-layout> <!-- See $slot at resources\views\components\layout.blade.php -->

    <article>

        <h1 class="font-bold mb-4" style="color: #333"> {!! $post->title !!} </h1>

        <div class="mb-4">
            <!-- The body from the given post -->
            {!!  $post->body !!}

        </div>

    </article>

<a style="color: #007BFF" href="/">Go back</a>
</x-layout>
