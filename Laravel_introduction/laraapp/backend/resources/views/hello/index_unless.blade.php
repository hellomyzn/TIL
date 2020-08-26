
@unless ($msg == "")
    {{ $msg }}
@else
    There is no message yet
@endunless

<form action="/hello/index_unless_post" method="post">
    {{ csrf_field() }}
    <input type="text" name="msg">
    <input type="submit">
</form>
