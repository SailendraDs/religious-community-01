<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Jaago') }}</title>
    <link rel="stylesheet" href="{{asset("assets/first/css/style.css")}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta name="description" content=" Mobile Template">
    <meta name="keywords" content="bootstrap, mobile template, Bootstrap 5, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="{{asset("assets/first/img/icon/favicon.png")}}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("assets/first/img/icon/192x192.png")}}">
    <script
      src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
      data-auto-a11y="true"
      ></script>
</head>
<body>

   
    <div id="loading">
        <div class="spinner-grow"></div>
    </div>
    @yield('content')
    
    
   
  
  
    <!-- Bootstrap-->
    <script src="{{asset("assets/first/js/lib/bootstrap.bundle.min.js")}}"></script>
    <!-- Splide -->
    <script src="{{asset("assets/first/js/plugins/splide/splide.min.js")}}"></script>
    <!-- Main Js File -->
    <script src="{{asset("assets/first/js/app.js")}}"></script>


</body>

</html>