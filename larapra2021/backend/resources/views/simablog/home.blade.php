<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Hello!

    @auth
        {{ Auth::user()->name }}
        <form method="POST" action="{{ route('simablog.logout') }}">
            @csrf

            <a href="{{ route('simablog.logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Log Out') }}
            </a>
        </form>
    @else
            @if (Route::has('register'))
                <a href="{{ route('simablog.show-register-form') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                <a href="{{ route('simablog.show-login-form') }}" class="text-sm text-gray-700 underline">Log in</a>
            @endif
    @endauth
</body>
</html>