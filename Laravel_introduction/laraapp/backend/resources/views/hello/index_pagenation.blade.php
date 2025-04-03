@extends('layouts.hello')

@section('css')
    <link href="{{ asset('css/table.css')}}" rel="stylesheet" href="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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

{{ $items->appends(['sord' => $sort])->links('vendor.pagination.simple-pagination') }}

@endsection
