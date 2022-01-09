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
                <!-- item -->
                <div class="col-6">
                    <a href="{{route("groups.view",[$group->id,md5($group->name)])}}" class="postItem">
                        <div class="imageWrapper">
                            <img src="@if($group->photo===NULL) {{asset("assets/groups/photo/default.jpg")}} @else {{asset("assets/groups/photo/".$group->photo)}} @endif" alt="image" class="image">
                            <div class="badge badge-warning">City</div>
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

