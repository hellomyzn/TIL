@empty($msg)
    There is no message
@else
    {{ $msg }}
@endempty

<form action="/hello/index_empty_post" method="post">
    {{csrf_field()}}
    <input type="text" name="msg">
    <input type="submit">
</form>
