@if ($msg != "")
    {{ $msg }}
@else
    There is no message yet
@endif
<form action="/hello/index_if" method="post">
    {!! csrf_field() !!}
    <input type="text" name="msg">
    <input type="submit">
</form>
