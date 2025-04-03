<x-layout title="TOP | つぶやきアプリ">
    <x-layout.single>
        <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">
            つぶやきアプリ
        </h2>
        <x-tweet.form.post></x-tweet.form.post>
    </x-layout.single>
</x-layout>
<x-tweet.form.post>
    @if (session('feedback.success'))
        <p style='color: green'> {{ session('feedback.success') }} </p>
    @endif
</x-tweet.form.post>

@foreach ($tweets as $tweet)
    <details>
        <summary>{{ $tweet->content }} by {{ $tweet->user->name }}</summary>
        @if (\Illuminate\Support\Facades\Auth::id() === $tweet->user_id)
            <div>
                <a href="{{ route('tweet.update.index', ['tweetId' => $tweet->id])}}">Edit</a>
                <form action="{{ route('tweet.delete', ['tweetId' => $tweet->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </div>    
        @else
            編集できません。
        @endif
    </details>
@endforeach
