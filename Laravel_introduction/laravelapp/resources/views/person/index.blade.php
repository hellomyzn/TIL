<head>
    <style>
        th {background-color: #999; color:fff; padding: 5px 10px;}
        td {boder: solid 1px #aaa; color:#999; padding: 5px 10px;}
    </style>
</head>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Mail</th>
        <th>Age</th>
    </tr>
    @foreach ( $items as $item)


        <tr>
            <td>{{$item->getData()}}</td>
        </tr>
    @endforeach
</table>