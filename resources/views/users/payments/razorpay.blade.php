@extends('layouts.app')
@section("title","Checkout")
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Checkout</h3>
        </div>
        
    </div>
</div>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-12">
        <div class="box">
          <div class="box-body">
            <form action="{{route('user.payment.razorpay',[$id])}}" method="POST" >
                <script src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="{{ env("RAZORPAY_KEY") }}"
                        data-amount="{{$amount*100}}"
                        data-buttontext="Checkout"
                        data-name="{{config("app.name")}}"
                        data-image="{{asset("assets/main/images/logo.png")}}"
                        data-prefill.name="{{Auth::user()->name}}"
                        data-prefill.email="{{Auth::user()->email}}"
                        data-prefill.phone="{{Auth::user()->mobile}}"
                        data-theme.color="#E33A50">
                </script>
                <input type="hidden" name="_token" value="{!!csrf_token()!!}">
            </form>
            <hr>
          </div>
        </div>
    </div>
</div>

</section>
<!-- /.content -->
@endsection
@section('scripts')
<script>
    window.onload = () => {
        $(".razorpay-payment-button").addClass("btn btn-danger")
    }
</script>
@endsection