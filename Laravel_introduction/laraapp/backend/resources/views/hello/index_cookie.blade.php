@extends('layouts.hello')

@section('content')
    <p>{{ $msg }}</p>
    @if(count($errors) > 0)
        <p>入力に問題があります。</p>
    @endif

    <table>
        <form action="/hello/index_cookie" method="post">
            {{ csrf_field() }}
            @if ($errors->has('msg'))
                <tr>
                    <th>Error: </th>
                    <td>{{ $errors->first('msg')}} </td>
                </tr>
            @endif
            <tr>
                <th>Message: </th>
                <td><input type="text" name="msg" value="{{old('msg')}}"></td>
            </tr>

            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </form>
    </table>
@endsection
