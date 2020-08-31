@extends('layouts.hello')

@section('css')
    <link href="{{ asset('css/table.css')}}" rel="stylesheet" href="">
@endsection

@section('content')

<table>
    <tr>
        <th>ID: </th>
        <th>Name: </th>
        <th>Mail: </th>
        <th>Age: </th>
    </tr>

        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
        </tr>




</table>
@endsection
