<p> {{ $msg }}</p>
<form action="/hello/cookie_post" method="post">
{{ csrf_field() }}
<p>Message: </p>
<input type="text" name="msg" value={{old('msg')}}>
<input type="submit" value="SEND">
</form>

