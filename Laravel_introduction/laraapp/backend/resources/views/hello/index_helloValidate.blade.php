@extends('layouts.hello')

@section('content')
    <p>{{ $msg }}</p>

    @if(count($errors) > 0)
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <table>
        <form action='/hello/index_helloValidate' method='post'>
            {{ csrf_field() }}
            @if(count($errors) > 0)
                <tr>
                    <th>Error: </th>
                    <td>{{ $errors->first('name')}}</td>
                </tr>
            @endif
            <tr>
                <th>name: </th>
                <td><input type='text' name='name' value={{old('name')}}></td>
            </tr>

            @if(count($errors) > 0)
                <tr>
                    <th>Error: </th>
                    <td>{{ $errors->first('mail')}}</td>
                </tr>
            @endif
            <tr>
                <th>mail: </th>
                <td><input type='text' name='mail' value={{old('mail')}}></td>
            </tr>


            @if(count($errors) > 0)
                <tr>
                    <th>Error: </th>
                    <td>{{ $errors->first('age')}}</td>
                </tr>
            @endif
            <tr>
                <th>age: </th>
                <td><input type='text' name='age' value={{old('age')}}></td>
            </tr>

            <tr>
                <th></th>
                <td><input type='submit' value='send'></td>
            </tr>
        </form>
    </table>
@endsection
