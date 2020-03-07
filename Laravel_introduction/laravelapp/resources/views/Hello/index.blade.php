<head>
    <style>
        th {background-color: #999; color:fff; padding: 5px 10px;}
        td {boder: solid 1px #aaa; color:#999; padding: 5px 10px;}
    </style>
</head>
<table>
    <tr>
        <th>Name</th>
        <th>Mail</th>
        <th>Age</th>
    </tr>
    @foreach ( $items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
        </tr>
    @endforeach
</table>
{{ $items->links() }}