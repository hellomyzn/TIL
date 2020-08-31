@extends('layouts.hello')

@section('css')
    <link href="{{ asset('css/table.css')}}" rel="stylesheet" href="">
@endsection

@section('content')
This is index db
<table>
    <tr>
        <th>Name: </th>
        <th>Mail: </th>
        <th>Age: </th>
    </tr>
        @foreach ($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
        </tr>
        @endforeach



</table>
@endsection
