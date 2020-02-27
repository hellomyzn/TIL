<p>{{$msg}}</p>

<form action="/cookie_post" method="post"></form>
{{ csrf_field() }}
<tr>
    <th>Message: <th>
    <td> <input type="text" name="msg" value="{{old('msg')}}"></td>
</tr>
<tr>
    <th><th>
    <td> <input type="submit"  value="send"></td>
</tr>
