<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="@yield('css')">
    <title>@yield('title')</title>
  </head>
  <body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <nav>
  		<div class="nav-wrapper #ff5252 red accent-2">
    		<a href="{{route('index')}}" class="brand-logo">Guestbook</a>
    		<ul id="nav-mobile" class="right hide-on-med-and-down">
      		<li><a href="{{route('hw1')}}">HW1</a></li>
          @section('list')
          @show
    		</ul>
  		</div>
		</nav>
    @section('container')
    @show
  </body>
</html>
