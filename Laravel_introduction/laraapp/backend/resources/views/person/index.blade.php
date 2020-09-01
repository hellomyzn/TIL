@extends('layouts.hello')

@section('css')
    <link href="{{ asset('css/table.css')}}" rel="stylesheet" href="">
@endsection

@section('content')
<table>
    <tr>
        <th>Name: </th>
        <th>Mail: </th>
        <th>Age: </th>
        <th>get data method</th>
        <th>Board</th>
    </tr>
        @foreach ($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
            <td>{{$item->getData()}}</td>
            <td>
                @if ($item->board != null)
                    {{ $item->board->getData() }}
                @endif

                @if($item->boards != null)
                    <table>
                        @foreach($item->boards as $obj)
                            <tr><td>{{ $obj->getData() }}</td></tr>
                        @endforeach
                    </table>
                @endif

            </td>
        </tr>

        @endforeach



</table>
@endsection
