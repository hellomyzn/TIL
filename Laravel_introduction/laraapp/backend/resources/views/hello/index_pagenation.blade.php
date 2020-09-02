@extends('layouts.hello')

@section('css')
    <link href="{{ asset('css/table.css')}}" rel="stylesheet" href="">
@endsection


@section('content')
<table>
    <tr>
        <th><a href="/hello/index_pagenation?sort=name">Name: </a></th>
        <th><a href="/hello/index_pagenation?sort=mail">Mail: </a></th>
        <th><a href="/hello/index_pagenation?sort=age">Age: </a></th>


    </tr>
        @foreach ($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
        </tr>

        @endforeach


</table>

{{ $items->appends(['sord' => $sort])->links() }}

@endsection
