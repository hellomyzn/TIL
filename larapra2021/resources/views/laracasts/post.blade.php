<x-laracasts.layout>

    <article>
        <h1>{{ $post->title }}</h1>
        
        <p>
            <a href="#">{{ $post->laracasts_category->name }}</a>
        </p>

        <div>{!! $post->body !!}</div>
    </article>

    <a href="/laracasts/posts">Go back</a>

</x-laracasts.layout>