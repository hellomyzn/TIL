@extends('layouts.hello')

@section('css')
    <link href="{{ asset('css/table.css')}}" rel="stylesheet" href="">
@endsection

@section('content')
    <form action="/person/find_scope" method='post'>
        {{ csrf_field() }}
        <input type="text" name='input' value="{{old($input)}}">
        <input type="submit" value='search'>
    </form>

    @if (isset($item))
        <table>
            <tr>
                <th>Data: </th>
            </tr>
            <tr>
                <td>{{ $item->getData()}}</td>
            </tr>
        </table>
    @endif
@endsection
