<h1>EDIT PAGE</h1>

<table>
    <form action="/hello/edit" method="post">
        {{ csrf_field() }}
    <tr>
    <input type="hidden" name="id" value="{{ $form->id }}">
        <th>name: </th><td><input type="text" name="name" value="{{ $form->name }}"></td>
    </tr>
    <tr>
        <th>mail: </th><td><input type="text" name="mail" value="{{ $form->name }}"></td>
    </tr>
    <tr>
        <th>age: </th><td><input type="number" name="age" value="{{ $form->name }}"></td>
    </tr>
    <tr>
        <td><input type="submit" value="send"></td>
    </tr>

    </form>
</table>
