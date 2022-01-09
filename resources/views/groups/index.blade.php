@extends('layouts.first')
@section("title","Groups")
@section('content')
<!-- App Header -->
<div class="appHeader">
        
    </div>
    <!-- searchBox -->
    
<div id="appCapsule">

        <div class="appContent">

<div class="sectionTitle mb-2">
               
    <div class="title">
                    <h1>Spaces</h1>
    </div>
</div>

            <!-- post list -->
            <div class="row">
			@if($groups->count()===0)
        <p>No Spaces found</p>
        @else
            @foreach($groups as $group)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-media h-28">
                            <div class="card-media-overly"></div>
                            <img src="@if($group->cover===NULL) {{asset("assets/groups/cover/default.jpg")}} @else {{asset("assets/groups/cover/".$group->cover)}} @endif" alt="" class="">
                        </div>
                        <div class="card-body">
                            <a href="{{route("groups.view",[$group->id,md5($group->name)])}}" class="font-semibold text-lg truncate"> {{$group->name}} </a>
                            <div class="flex items-center flex-wrap space-x-1 text-sm text-gray-500 capitalize">
                                <a href="#"> <span> {{\App\Models\GroupMember::where(["group_id"=>$group->id,"approved"=>1])->count()}} members </span> </a>
                                <a href="#"> <span> @if($group->posts) {{$group->posts->count()}} @else 0 @endif posts </span> </a>
                            </div> 
    
                            <div class="flex mt-3 space-x-2 text-sm">
                                <a href="{{route("groups.view",[$group->id,md5($group->name)])}}" class="bg-blue-600 flex flex-1 h-8 items-center justify-center rounded-md text-white capitalize"> 
                                    Join 
                                </a>
                                <a href="{{route("groups.view",[$group->id,md5($group->name)])}}" class="bg-gray-200 flex flex-1 h-8 items-center justify-center rounded-md capitalize"> 
                                    View 
                                </a>
                            </div>    
    
                        </div>
                        <h2 class="title">{{$group->name}}</h2>
                        <footer>
                            <i class="fa fa-users">{{\App\Models\GroupMember::where(["group_id"=>$group->id,"approved"=>1])->count()}} members</i>
                        </footer>
                    </a>
                </div>
                @endforeach
        @endif
                <!-- * item -->
            </div>
			<div class="pagination">
        {{$groups->links()}}
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

