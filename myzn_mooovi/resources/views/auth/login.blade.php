@extends('layout')

@section('content')
<div class="bgcolor-white pt1em pb1em" id="contents">  <div id="main_cnt_wrapper">
  <div id="yjContentsBody">
    <div class="yjContainer">
      <div class="form_box">
        <h2>Myzn mooovi <span>Login</span></h2>
        {{ Form::open() }}
          @if (count($errors) > 0)
            <div id="error_explanation">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <div>
            {{ Form::email('email', '', ['placeholder' => 'Mail address']) }}
          </div>
          <div>
            {{ Form::password('password', ['placeholder' => 'Password']) }}
          </div>
          <div class="row">
            <div class="col-xs-6">
              {{ Form::checkbox('remember_me', '') }}
              {{ Form::label('', 'remember me')}}
            </div>
            <div class="submit">{{ Form::submit('Login', ['class' => 'btn btn--block']) }}</div>
          </div>
        {{ Form::close() }}
        <div class="more_link_box">
          <strong>Don't have a your account yet?</strong>
          <a href="/register">Sign Up</a>
          <strong>Forgot your password?</strong>
          <a href="/password/reset">Forgot your password?</a>
        </div>
      </div>
    </div>
  </div>
@endsection
