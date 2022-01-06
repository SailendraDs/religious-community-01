@extends('layouts.app')
@section("title","Campaigns")
@section('content')
<!-- Start of header section
   ============================================= -->
  
   <section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" data-background="[asset]">
      <span class="breadcrumb-overlay position-absolute"></span>
      <div class="container">
         <div class="yl-breadcrumb-content text-center yl-headline"> 
            <h2>Webinars</h2>
            <div class="yl-breadcrumb-item ul-li">
               <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Webinars</li>
             </ul>
          </div>
       </div>
    </div>
 </section>
<!-- End of breadcrumb section
   ============================================= -->
      <!-- Start of course page section
         ============================================= -->
         <section id="course-page-course" class="course-page-course-section">
            <div class="container">
              <div class="course-page-course-content">
                 <div class="course-page-course-content-top">
              
                 </div>
                 <div class="course-page-courses-item"> 
                    @if($campaigns->count()===0)
                    <p>No Campaigns found</p>
                    @else
                    <div class="row">
                        @foreach ($campaigns as $campaigns)
                       <div class="col-lg-4 col-md-6">
                          <div class="yl-popular-course-img-text">
                             <div class="yl-popular-course-img text-center">
                                <img src="{{asset("assets/campaigns/thumbnail/".$campaigns->thumbnail)}}" alt="">
                             </div>
                             <div class="yl-popular-course-text">
                                <div class="popular-course-fee clearfix">
                                   <span>Campaign Amount:  </span>
                                   <div class="course-fee-amount">
                                      <strong> INR</strong>
                                   </div>
                                </div>
                                <div class="popular-course-title yl-headline mb-2">
                                   <h3><a href="{{route("campaigns.view",[$campaigns->id,md5($campaigns->title)])}}">{{$campaigns->title}}</a>
                                   </h3>
                                  
                                </div>
                               
                                </div>
                             </div>
                          </div>
                       </div>
                       @endforeach
                    </div>
                    @endif
                   
                 </div>
              </div>
            </div>
        </section>
     <!-- End of course page section
        ============================================= -->
@endsection