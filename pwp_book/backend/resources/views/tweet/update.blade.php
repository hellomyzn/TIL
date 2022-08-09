<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tweet App</title>
</head>
<body>
    <h1>Edit Tweet</h1>
    <div>
        <a href="{{ route('tweet.index') }}"> < Back </a>
        <p>Tweet Form</p>
        <form action="{{ route('tweet.update.put', ['tweetId' => $tweet->id]) }}" method="post">
            @method('PUT')
            @csrf
            <label for="tweet-content">Tweet</label>
            <span>*Until 140 characters</span>
            <textarea name="tweet" type="text" id="tweet-content" placeholder="Write down here">{{ $tweet->content}}</textarea>
            @error('tweet')
                <p style='color: red;'>{{ $message }}</p>
            @enderror
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>