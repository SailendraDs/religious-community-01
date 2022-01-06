
@extends('layouts.app')
@section("title",$campaign->title)
@section('content')
<section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" data-background="{{asset("assets/campaigns/thumbnail/".$campaign->thumbnail)}}">
   <span class="breadcrumb-overlay position-absolute"></span>
   <div class="container">
      <div class="yl-breadcrumb-content text-center yl-headline"> 
         <h2>{{$campaign->title}}</h2>
         <div class="yl-breadcrumb-item ul-li">
            <ul class="breadcrumb">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
                 </ul>
       </div>
    </div>
 </div>
</section>
<section id="course-details" class="course-details-section">
   <div class="container">
      <div class="course-details-content">
         <div class="row">
            <div class="col-lg-9">
               <div class="course-details-tab-area">
                  <div class="course-details-tab-wrapper">
                     <div class="course-details-tab-btn clearfix ul-li">
                        <ul id="tabs" class="nav text-uppercase nav-tabs">
                           <li class="nav-item"><a href="#" data-target="#overview" data-toggle="tab" class="nav-link text-capitalize active">Overview </a></li>
                           <li class="nav-item"><a href="#" data-target="#instructor" data-toggle="tab" class="nav-link text-capitalize">Author</a></li>
                        </ul>
                     </div>
                     <div class="course-details-tab-content-wrap">
                        <div id="tabsContent" class="tab-content">
                           <div id="overview" class="tab-pane fade  active show">
                              <div class="course-details-overview yl-headline pera-content">
                                 <div class="course-overview-text">
                                    <h3 class="c-overview-title">Campaign details</h3>
                                    <div>{!!$campaign->description!!}</div>
                                 </div>
                                 <div class="course-details-overview-feature">
                                    <h3 class="c-overview-title">Images</h3>
                                    <div class="row">
                                        @foreach($campaign->images as $image)
                                        <div class="col-md-4">
                                            <img src="{{$image}}" alt="image" height="200px" width="200px">
                                        </div>
                                        @endforeach
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div id="instructor" class="tab-pane fade">
                              <div class="cd-course-instructor yl-headline pera-content clearfix">
                                 <h3 class="c-overview-title">Instructions</h3>
                                 <div class="cd-course-instructor-img-text clearfix">
                                    <div class="cd-course-instructor-img float-left">
                                    {!!$campaign->instructions!!}
                                            </div>
                                   
                                    </div>
                                 </div>
                                 <div class="cd-ins-details">
                                  
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="course-details-widget">
                  <div class="course-widget-wrap">
                     <div class="cd-video-widget position-relative">
                        <img src="{{asset("assets/campaign/thumbnail/".$campaign->thumbnail)}}" alt="">
                        <a class="video_box text-center" href="#"><i class="fas fa-play"></i></a>
                     </div>
                  </div>
                 
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
