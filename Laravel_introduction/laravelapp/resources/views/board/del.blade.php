<table>
    <form action="board/del" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $form->id }}">
        <tr>
            <th>title: </th><td>{{ $form->title }}</td>
        </tr>
        <tr>
            <th>person_id: </th><td>{{ $form->person_id }}</td>
        </tr>
        <tr>
            <th>message: </th><td>{{ $form->message }}</td>
        </tr>
        <tr>
            <th> </th><td><input type="submit" value="send"></td>
        </tr>
    </form>
</table>