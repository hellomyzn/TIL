<head>
    <style>
        th {background-color: #999; color:fff; padding: 5px 10px;}
        td {boder: solid 1px #aaa; color:#999; padding: 5px 10px;}
    </style>
    <link rel="stylesheet" href="text/css" href="css/app.css">
</head>
@if (Auth::check())
<p>User: {{$user->name . '(' . $user->email . ')' }}</p>
@else
<p>You couldn't login ( <a href="/login">ログイン</a> <a href="/regster">登録</a></p>    
@endif
<table>
    <tr>
        <th><a href="/hello?sort=name">Name</a></th>
        <th><a href="/hello?sort=mail">Mail</a></th>
        <th><a href="/hello?sort=age">Age</a></th>
    </tr>
    @foreach ( $items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
        </tr>
    @endforeach
</table>
{{ $items->appends(['sort' => $sort])->links() }}