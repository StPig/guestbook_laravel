@extends('master')

@section('css', 'css/signup.css')
@section('title', 'Sign up')

@section('list')
<li><a href="{{route('login')}}">Login</a></li>
@endsection

@section('container')
<div id="container" class="row z-depth-3">
  <form class="col s12" action="{{route('signup.todb')}}" method="POST">
    <div class="row">
      <div class="input-field col s8 offset-s2">
        <input id="account" type="text" class="validate" name="account">
        <label for="account">Account</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s8 offset-s2">
        <input id="password" type="password" class="validate" name="password">
        <label for="password">Password</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s8 offset-s2">
        <input id="checkpassword" type="password" class="validate" name="checkpassword">
        <label for="checkpassword" data-error="wrong" data-success="right">CheckPassword</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s8 offset-s2">
        <input id="username" type="text" class="validate" name="username">
        <label for="username">Username</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s8 offset-s2">
        <input id="email" type="email" class="validate" name="email">
        <label for="email" data-error="wrong" data-success="right">Email</label>
      </div>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button class="btn waves-effect waves-light col s2 offset-s10" type="submit" name="action">Submit
      <i class="material-icons right">send</i>
    </button>
  </form>
</div>
@endsection
