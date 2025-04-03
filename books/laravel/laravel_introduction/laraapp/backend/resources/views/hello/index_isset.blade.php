@isset($msg)
    {{ $msg }}
@else
    There is no message yet
@endisset

<form action="/hello/index_isset" method="post">
    {{ csrf_field() }}
    <input type="text" name="msg">
    <input type="submit">
</form>
