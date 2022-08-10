<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script src="{{ mix('/js/app.js') }}"></script>
    <title>Tweet App</title>
</head>
<body>
    <h1>Tweets</h1>
    @auth
        <div>
            <p>Tweet Form</p>
            @if (session('feedback.success'))
                <p style='color: green'> {{ session('feedback.success') }} </p>
            @endif
            <form action="{{ route('tweet.create') }}" method="post">
                @csrf
                <label for="tweet-content">Tweet</label>
                <span>*Until 140 characters</span>
                <textarea name="tweet" id="tweet-content" type='text' placeholder='Write down here.'></textarea>
                @error('tweet')
                    <p style="color: red;"> {{ $message }} </p>
                @enderror
                <button type='submit'>Send</button>
            </form>
        </div>    
    @endauth

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
</body>
</html>