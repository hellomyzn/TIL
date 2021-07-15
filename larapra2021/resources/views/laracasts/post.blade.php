<x-laracasts.layout>

    <article>
        <h1>{{ $post->title }}</h1>
        
        <p>
            By <a href="#">{{ $post->laracasts_user->name}}</a>
            in <a href="/laracasts/categories/{{$post->laracasts_category->slug}}">{{ $post->laracasts_category->name }}</a>
        </p>

        <div>{!! $post->body !!}</div>
    </article>

    <a href="/laracasts/posts">Go back</a>

</x-laracasts.layout>