<form action="/hello/index_upload" method='post' enctype='multipart/form-data'>
    @csrf
    <input type="file" name='file'>
    <input type="submit">
</form>
