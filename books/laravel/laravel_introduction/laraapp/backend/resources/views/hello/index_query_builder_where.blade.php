@extends('layouts.hello')

@section('css')
    <link href="{{ asset('css/table.css')}}" rel="stylesheet" href="">
@endsection

@section('content')

@if($items != null)
    @foreach ($items as $item)
        <table>
            <tr>
                <th>ID: </th>
                <th>Name: </th>
            </tr>
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
            </tr>

        </table>
    @endforeach
@endif
@endsection
