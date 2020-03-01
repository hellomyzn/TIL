<table>
    @foreach ($items as $item)
    <tr>
        <th>id: </th><td>{{$item->id}}</td>
        <th>name: </th><td>{{$item->name}}</td>
        <th>mail: </th><td>{{$item->mail}}</td>
        <th>age: </th><td>{{$item->age}}</td>
    </tr>
        
    @endforeach

</table>