@extends('master')

@section('css', 'css/hw1.css')
@section('title', 'HW1')

@section('list')
@if(session()->has('portalaccount'))
<li>{{$portalaccount}}</li>
<li><a href="{{route('logout.portal')}}">Logout</a></li>
<li><a href="{{route('portallogout')}}">PortalLogout</a></li>
@else
<li><a href="{{route('login.portal')}}">Login</a></li>
@endif
@endsection

@section('container')
@if(session()->has('portalaccount'))
  @if(session()->has('m') && session()->has('n'))
  <div id="container" class="row z-depth-3">
    <div id="mul">
      <p>M:{{$m}} N:{{$n}}</p>
      @for($i = 1;$i<=$m;$i++)
        @for($j = 1;$j<=$n;$j++)
        <span>{{$i}}*{{$j}}={{$i*$j}}</span>
        @endfor
      </br>
      @endfor
    </div>
  </div>
  @else
  <div id="container" class="row z-depth-3">
    <p>請輸入乘法表的M*N:</p>
    <form class="col s12" action="{{route('mul')}}" method="POST">
      <div class="row">
        <div class="input-field col s8 offset-s2">
          <input id="m" type="text" class="validate" name="m">
          <label for="m">M</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8 offset-s2">
          <input id="n" type="text" class="validate" name="n">
          <label for="n">N</label>
        </div>
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button class="btn waves-effect waves-light col s3 offset-s7" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
      </button>
    </form>
  </div>
  @endif
@else
<div id="container" class="row z-depth-3">
  <h1>Please login first!</h1>
</div>
@endif
@endsection
