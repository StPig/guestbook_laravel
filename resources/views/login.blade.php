@extends('master')

@section('css', 'css/login.css')
@section('title', 'Login')

@section('list')
<li><a href="{{route('login')}}">Login</a></li>
@endsection

@section('container')
<div id="container" class="row z-depth-3">
  <form class="col s12" action="{{route('login.check')}}" method="POST">
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
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button class="btn waves-effect waves-light col s2 offset-s8" type="submit" name="action">Submit
      <i class="material-icons right">send</i>
    </button>
  </form>
  <button id="signup" class="btn waves-effect waves-light" onClick=linkSignup() name="action">
    <i class="material-icons left">perm_identity</i>Sign Up
  </button>
</div>
<script>
function linkSignup()
{
  location.href="{{route('signup')}}";
}
</script>
@endsection
