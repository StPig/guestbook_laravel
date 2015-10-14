@extends('master')

@section('css', 'css/index.css')
@section('title', 'Guestbook')

@section('list')
@if(Auth::check())
<li id="username">{{$user->username}}</li>
<li><a href="{{route('logout')}}">Logout</a></li>
@else
<li><a href="{{route('login')}}">Login</a></li>
@endif
@endsection

@section('container')
<div id="container" class="row">
  <form class="col s12" action="{{route('message.post')}}" method="POST">
    <div class="row">
      <div class="input-field col s8">
        <input id="title" type="text" class="validate" name="title">
        <label for="title">Title</label>
      </div>
      <div class="input-field col s4">
        @if(Auth::check())
          <input id="name" value="{{$user->username}}" type="text" class="validate" name="name">
        @else
          <input id="name" value="" type="text" class="validate" name="name">
        @endif
        <label for="name" claa="active">Name</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <textarea id="content" class="materialize-textarea" name="content"></textarea>
        <label for="content">Content</label>
      </div>
    </div>
    <input type="hidden" name="poster" value="{{$user->username}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button class="btn waves-effect waves-light col s3 offset-s9" type="submit" name="action">Submit
	     <i class="material-icons right">send</i>
	  </button>
  </form>
</div>
<div id="message">
  @foreach($messages as $message)
  <div class="row">
    <div class="col s8">
      Title:{{$message->title}}
    </div>
    <div class="col s4">
      Name:{{$message->name}}
    </div>
    <div class="col s12">
      Content:{{$message->content}}
    </div>
    <span>
      ------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    </span>
  </div>
  @endforeach
</div>
@endsection
