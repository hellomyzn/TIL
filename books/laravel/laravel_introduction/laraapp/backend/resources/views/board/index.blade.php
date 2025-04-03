@extends('layouts.hello')

@section('css')
    <link href="{{ asset('css/table.css')}}" rel="stylesheet" href="">
@endsection

@section('content')
<table>
    <tr>
        <th>person id: </th>
        <th>title: </th>
        <th>message: </th>
        <th>Get Data: </th>
    </tr>
        @foreach ($items as $item)
        <tr>
            <td>{{$item->person_id}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->message}}</td>
            <td>{{$item->getData()}}</td>
        </tr>

        @endforeach



</table>

With
<table>
    <tr>
        <th>person id: </th>
        <th>title: </th>
        <th>message: </th>
        <th>Get Data: </th>
    </tr>
        @foreach ($with as $item)
        <tr>
            <td>{{$item->person_id}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->message}}</td>
            <td>{{$item->getData()}}</td>
        </tr>

        @endforeach



</table>
@endsection
