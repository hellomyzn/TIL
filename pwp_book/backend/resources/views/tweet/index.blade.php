<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tweet App</title>
</head>
<body>
    <h1>Tweets</h1>
    <div>
        <p>Tweet Form</p>
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
</body>
</html>