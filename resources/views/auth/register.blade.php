@extends('layouts.first')
@section('content')
<div>&nbsp;</div>

<div class="appHeader">
        <div class="left">
            <a href="javascript:;" class="icon goBack">
                <i class="icon ion-ios-arrow-back"></i>
            </a>
        </div>
        
        <div class="pageTitle">Register</div>
        @guest
        @if (Route::has('register'))<div class="right">
     
            <a href="{{ route('login') }}" class="link">Login</a>
        </div>
        @endif
                        @endguest
    </div>
  
 <!-- searchBox -->
    
    <!-- * searchBox -->
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="searchBox">
        <form>
            <span class="inputIcon">
                <i class="icon ion-ios-search"></i>
            </span>
            <input type="text" class="form-control" id="searchInput" placeholder="Search...">
            <a href="javascript:;" class="toggleSearchbox closeButton">
                <i class="icon ion-ios-close-circle"></i>
            </a>
        </form>
    </div>
     <!-- searchBox -->
    
    <!-- * searchBox -->
    <!-- * App Header -->

    <!-- App Capsule -->

<div id="appCapsule">

<div class="appContent">


<div class="sectionTitle text-center mt-3">
    <div class="title">
        <h1>Welcome to Jaago</h1>
    </div>
    <div class="lead mb-2">Register to continue</div>
</div>


<form method="POST" action="{{ route('register') }}">
@csrf
    <div class="form-group">
        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Your Full Name" required autofocus>
        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
   
    <div class="form-group">
        <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail Address" required autofocus>
        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
    <div class="form-group">
        <input id="mobile" name="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" placeholder="Mobile Number" required autofocus>
        @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
    <div class="form-group">
        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter 6 Digit PIN" required autocomplete="new-password">
        
        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
    <div class="form-group">
        <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirm your 6 Digit PIN" autocomplete="new-password">
        
    
    </div>
   
    <div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">
           Register
        </button>
    </div>
</form>


</div>
</div>

@endsection