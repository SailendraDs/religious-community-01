<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Jaago') }}</title>
	<link rel="stylesheet" href="{{asset("assets/second/css/main.min.css")}}">
	<link rel="stylesheet" href="{{asset("assets/second/css/style.css")}}">
	<link rel="stylesheet" href="{{asset("assets/second/css/color.css")}}">
    <script
      src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
      data-auto-a11y="true"
      ></script>
</head>
<body class="full-page">
<div class="row no-gutters vh-100 loader-screen">
    <div class="col align-self-center text-white text-center">
        <img src="images/logo-white.png" alt="logo">
        <h1>Jaago</h1>
        <div class="laoderhorizontal">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<div class="app-layout">
	
	<header class="topbar">
		
		<div class="logo-place"><a href="#" title=""><img src="{{asset("assets/second/images/logo.png")}}" alt=""></a></div>
		<div class="ac-settings" title="Settings"><i class="lni lni-radio-button"></i></div>
		
	</header>

	<div class="bottom-header">
		<ul class="menu-left">
			<li><a class="ico-hover" href="#" title=""><i class="fa fa-home"></i></a></li>
			<li><a class="ico-hover" href="#" title=""><i class="fa fa-user-friends"></i></a></li>
		</ul>
		<div id="nav-icon2" class="menu-button">
        <i class="fa fa-ellipsis-v"></i>
			
		</div>
		<ul class="menu-right">
			<li><a class="ico-hover" href="#" title=""><i class="fa fa-wallet"></i></a></li>
			<li class=""><a class="ico-hover" href="#" title=""><i class="fa fa-sliders-h"></i></a></li>
		</ul>
	</div>

	<nav>
	  <ul class="menu">
		  <li data-text="Home"><a href="#" title=""><i></i><span>Home</span></a></li>
		  <li data-text="Home"><a href="#" title=""><i></i><span>My Profile</span></a></li>
		  <li data-text="Home"><a href="#" title=""><i></i><span>Photos</span></a></li>
		  	  </ul>
	</nav><!-- compact nav menu -->

    @yield('content')

<script src="{{asset("assets/second/js/main.min.js")}}"></script>
	<script src="{{asset("assets/second/js/jquery-stories.js")}}"></script>
	<script src="{{asset("assets/second/js/script.js")}}"></script>

</body>
</html>