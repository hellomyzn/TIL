<table>
    <form action="/rest" method="post">
        {{ csrf_field()}}
        <tr>
            <th>message: </th><td><input type="text" name="message" value="{{old('message')}}"></td>
            <th>url: </th><td><input type="text" name="url" value="{{old('url')}}"></td>
            <tr>
                <th></th><td><input type="submit" value="send"></td>
            </tr>
        </tr>
    </form>
</table>