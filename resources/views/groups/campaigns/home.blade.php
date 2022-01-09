@extends('layouts.first')
@section("title","Campaigns")
@section('content')
<div class="appHeader">
        
    </div>
    <!-- searchBox -->
    
<div id="appCapsule">

        <div class="appContent">

<div class="sectionTitle mb-2">
               
    <div class="title">
                    <h1>Campaigns</h1>
    </div>
</div>
<div class="row">
@if($campaigns->count()===0)
                    <p>No Campaigns found</p>
                    @else
                    <div class="row">
                        @foreach ($campaigns as $campaigns)
                <div class="col-6">
                    <a href="{{route("groups.campaigns.view",[$campaigns->id,md5($campaigns->title)])}}" class="postItem">
                        <div class="imageWrapper">
                            <img src="{{asset("assets/campaigns/thumbnail/".$campaigns->thumbnail)}}" alt="image" class="image">
                            <div class="badge badge-warning">Category</div>
                        </div>
                        <h2 class="title">{{$campaigns->title}}</h2>
                        
                    </a>
                </div>
                @endforeach
        @endif
                <!-- * item -->
            </div>
			
	</div>
	</div>

	<div class="appBottomMenu">
        <div class="item">
            <a href="#">
                <p>
                    <i class="fa fa-home"></i>
                    <span>Newsfeed</span>
                </p>
            </a>
        </div>
        <div class="item active">
            <a href="#">
                <p>
                    <i class="fa fa-user-friends"></i>
                    <span>Groups</span>
                </p>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <p>
                    <i class="fa fa-wallet"></i>
                    <span>Transactions</span>
                </p>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <p>
                    <i class="fa fa-users-cog"></i>
                    <span>My Groups</span>
                </p>
            </a>
        </div>
        
    </div>
         
      
@endsection