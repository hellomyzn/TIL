<x-laracasts.layout>

    <article>
        <h1>{{ $post->title }}</h1>
        <div>{!! $post->body !!}</div>
    </article>

    <a href="/laracasts/posts">Go back</a>

</x-laracasts.layout>