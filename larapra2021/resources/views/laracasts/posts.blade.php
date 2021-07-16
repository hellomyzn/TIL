<x-laracasts.layout>

    @include('laracasts._posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-laracasts.post-featured-card/>

        <div class="lg:grid lg:grid-cols-2">
            <x-laracasts.post-card/>
            <x-laracasts.post-card/>
        </div>

        <div class="lg:grid lg:grid-cols-3">
            <x-laracasts.post-card/>
            <x-laracasts.post-card/>
            <x-laracasts.post-card/>
        </div>
    </main>

    {{-- @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/laracasts/post/{{$post->slug}}">
                    {{ $post->title }}
                </a>
            </h1>

            <p>
                By <a href="/laracasts/users/{{ $post->laracasts_user->username }}">{{ $post->laracasts_user->name}}</a>
                in <a href="/laracasts/categories/{{$post->laracasts_category->slug}}">{{ $post->laracasts_category->name }}</a>
            </p>

            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach --}}
</x-laracasts.layout>

