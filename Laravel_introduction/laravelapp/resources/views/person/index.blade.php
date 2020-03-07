<head>
    <style>
        th {background-color: #999; color:fff; padding: 5px 10px;}
        td {boder: solid 1px #aaa; color:#999; padding: 5px 10px;}
    </style>
</head>
<table>
    <tr>
        <th>Person</th>
        <th>Board</th>
    </tr>
    @foreach ( $items as $item)
        <tr>
            <td>{{$item->getData()}}</td>

            <td>@if ($item->board != null)
                <table width="100%">
                    @foreach ($item->boards as $obj)
                        <tr>
                            <td>{{ $obj->getData() }}</td>
                        </tr>
                    @endforeach
                </table>
            @endif</td>
        </tr>
    @endforeach
</table>