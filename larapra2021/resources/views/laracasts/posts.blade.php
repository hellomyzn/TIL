<x-laracasts.layout>

    @include('laracasts._posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if($posts->count())
            <x-laracasts.posts-grid :posts="$posts"/>
        @else
            <p class="text-center">No posts yet. Please check  back later</p>
        @endif     



        {{-- <div class="lg:grid lg:grid-cols-3">
            @foreach ($posts->skip(1) as $post)
                <x-laracasts.post-card :post="$post"/>    
            @endforeach
        </div> --}}
    </main>
</x-laracasts.layout>

