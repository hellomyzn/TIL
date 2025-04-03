@extends('layouts.hello')

@section('title', 'Add')

@section('menubar')
    @parent
    <li>This is Add page</li>
@endsection

@section('content')
    <table>
        <form action="/hello/add" method='post'>
            {{csrf_field() }}
            <tr>
                <th>Name: </th>
                <td>
                    <input type="text" name="name">
                </td>
            </tr>

            <tr>
                <th>Mail: </th>
                <td>
                    <input type="text" name="mail">
                </td>
            </tr>

            <tr>
                <th>Age: </th>
                <td>
                    <input type="text" name="age">
                </td>
            </tr>

            <tr>
                <th></th>
                <td><input type="submit" value='send'></td>
            </tr>
        </form>
    </table>
@endsection
