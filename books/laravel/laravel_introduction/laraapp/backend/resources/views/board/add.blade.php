@extends('layouts.hello')

@section('title', 'Add')

@section('menubar')
    @parent
    <li>This is Add page</li>
@endsection

@section('content')
    <table>
        <form action="/board/add" method='post'>
            {{csrf_field() }}

            <tr>
                <th>Person_id: </th>
                <td>
                    <input type="text" name="person_id">
                </td>
            </tr>

            <tr>
                <th>Title: </th>
                <td>
                    <input type="text" name="title">
                </td>
            </tr>

            <tr>
                <th>message: </th>
                <td>
                    <input type="text" name="message">
                </td>
            </tr>

            <tr>
                <th></th>
                <td><input type="submit" value='send'></td>
            </tr>
        </form>
    </table>
@endsection
