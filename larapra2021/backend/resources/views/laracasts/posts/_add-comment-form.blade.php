@auth
    <x-laracasts.panel >
        <form action="/laracasts/posts/{{ $post->slug}}/comments" method="POST">
            @csrf
            <header class="flex item-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->user()->id ?? 0}}" alt="" width="40" height="40" class="rounded-full">
                <h2 class="ml-4"> Want to participate?</h2>
            </header>
            <div class="mt-6">
                <textarea name="body" id="body" cols="30" rows="5" class="w-full text-sm focus:outline-none focus:ring" placeholder="Quick, thing of something to say!" required></textarea>
                @error('body')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200 pt-6">
                <x-laracasts.button>Comment</x-laracasts.button>
            </div>

        </form>
    </x-laracasts.panel>
@else
    <div class="font-semibold">
        <a href="/laracasts/register" class=" hover:underline">Register</a> or
        <a href="/laracasts/login" class=" hover:underline">Log In to leave a comment</a>
    </div>
@endauth