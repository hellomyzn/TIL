<table>
    <form action="/hello/add" method="post">
        {{ csrf_field() }}
        <tr>
            <th>ID: </th>
            <td><input type="int" name="id"></td>
        </tr>        
        <tr>
            <th>Name: </th>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <th>Mail: </th>
            <td><input type="text" name="mail"></td>
        </tr>
        <tr>
            <th>Age: </th>
            <td><input type="text" name="age"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="Send"></td>
        </tr>
    </form>

</table>