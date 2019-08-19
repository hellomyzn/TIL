<h1>DB ADD</h1>

<table>
    <form action="hello/add" method="post">
        {{ csrf_field() }}
    </form>
    <tr>
        <th>name: </th><td><input type="text" name="name"></td>
    </tr>
    <tr>
        <th>mail: </th><td><input type="text" name="mail"></td>
    </tr>
    <tr>
        <th>age: </th><td><input type="text" name="age"></td>
    </tr>
    <tr>
        <td><th><th>
        <td><input type="submit" value="send"></td>
    </tr>
</table>
