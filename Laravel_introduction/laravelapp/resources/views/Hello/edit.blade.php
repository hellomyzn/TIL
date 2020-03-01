<table>
    <form action="/hello/edit" method="post">
        {{ csrf_field() }}
        <tr>
            <th>ID: </th>
            <td><input type="int" name="name" value="{{$form->id}}"></td>
        </tr>
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr>
            <th>Name: </th>
            <td><input type="text" name="name" value="{{$form->name}}"></td>
        </tr>
        <tr>
            <th>Mail: </th>
            <td><input type="text" name="mail" value="{{$form->mail}}"></td>
        </tr>
        <tr>
            <th>Age: </th>
            <td><input type="text" name="age" value="{{$form->age}}"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="Send"></td>
        </tr>
    </form>

</table>