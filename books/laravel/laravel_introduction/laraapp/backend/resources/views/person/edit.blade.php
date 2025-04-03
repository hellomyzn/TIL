@extends('layouts.hello')

@section('title', 'Add')

@section('menubar')
    @parent
    <li>This is Edit page</li>
@endsection
@section('content')

    <table>
        <form action="/person/edit" method='post'>
            {{csrf_field() }}
            <input type="hidden" name='id' value="{{ $item->id}}">
            <tr>
                <th>Name: </th>
                <td>
                    <input type="text" name="name" value="{{ $item->name }}">
                </td>
            </tr>

            <tr>
                <th>Mail: </th>
                <td>
                    <input type="text" name="mail" value="{{ $item->mail }}">
                </td>
            </tr>

            <tr>
                <th>Age: </th>
                <td>
                    <input type="text" name="age" value="{{ $item->age }}">
                </td>
            </tr>

            <tr>
                <th></th>
                <td><input type="submit" value='send'></td>
            </tr>
        </form>
    </table>
@endsection
