@extends('layouts.hello')

@section('title', 'Add')

@section('menubar')
    @parent
    <li>This is Delete page</li>
@endsection

@section('css')
    <link href="{{ asset('css/table.css')}}" rel="stylesheet" href="">

@endsection

@section('content')

    <table>
        <form action="/hello/del" method='post'>
            {{csrf_field() }}
            <input type="hidden" name='id' value="{{ $item->id}}">
            <tr>
                <th>Name: </th>
                <td>
                    {{ $item->name}}
                </td>
            </tr>

            <tr>
                <th>Mail: </th>
                <td>
                    {{ $item->mail}}
                </td>
            </tr>

            <tr>
                <th>Age: </th>
                <td>
                    {{ $item->age}}
                </td>
            </tr>

            <tr>
                <th></th>
                <td><input type="submit" value='delete'></td>
            </tr>
        </form>
    </table>
@endsection
