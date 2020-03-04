@if (count($errors) > 0)
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }} </li>            
        @endforeach
    </ul>
</div>
@endif

<table>
    <form action="/person/edit" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $form->id }}">
        <tr>
            <th>name: <td></td></th> <td><input type="text" name="name" value="{{ $form->name }}"></td>
            <th>mail: <td></td></th> <td><input type="text" name="mail" value="{{ $form->mail }}"></td>
            <th>age: <td></td></th> <td><input type="number" name="age" value="{{ $form->age }}"></td>
            <th><td></td></th> <td><input type="submit"  value="sent"></td>
        </tr>
    </form>
</table>