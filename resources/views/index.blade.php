@extends('master')

@section('css', 'css/index.css')
@section('title', 'Guestbook')

@section('list')
@if(Auth::check())
<li>{{$user->account}}</li>
<li><a href="{{route('logout')}}">Logout</a></li>
@else
<li><a href="{{route('login')}}">Login</a></li>
@endif
@endsection

@section('container')
<div id="container" class="row">
  <form class="col s12" action="newpost_toDB.php" method="POST">
    <div class="row">
      <div class="input-field col s8">
        <input id="title" type="text" class="validate" name="title">
        <label for="title">Title</label>
      </div>
      <div class="input-field col s4">
        <input id="username" value="<?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}else{} ?>" type="text" class="validate" name="username">
        <label for="username" claa="active">Username</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <textarea id="content" class="materialize-textarea" name="content"></textarea>
        <label for="content">Content</label>
      </div>
    </div>
    <button class="btn waves-effect waves-light col s3 offset-s9" type="submit" name="action">Submit
	     <i class="material-icons right">send</i>
	  </button>
  </form>
</div>
@endsection
