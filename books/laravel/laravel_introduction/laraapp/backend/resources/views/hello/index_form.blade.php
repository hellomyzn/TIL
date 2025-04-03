<form action="/hello" method="post">
    {{ csrf_field() }}
    <input type="text" name="msg">
    <input type="submit">
</form>
