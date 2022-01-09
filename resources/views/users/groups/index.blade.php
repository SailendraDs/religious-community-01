@extends('layouts.first')
@section("title","My Spaces")
@section('content')
<div class="appHeader">
        
    </div>
    <!-- searchBox -->
    
<div id="appCapsule">
<div class="appContent">

<div class="sectionTitle mb-2">
               
    <div class="title">
                    <h1>My Created Spaces</h1>
    </div>
</div>
<div class="card-header">
                <a href="{{route("groups.campaigns.campaigns.create")}}" class="btn btn-primary">Create new Space</a>
 </div>
<div class="table-responsive">
@if($groups->count()===0)
                <p>No Spaces found.</p>
                @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Created at</th>
                            <th>View</th>
                        </tr>
                    </thead>
                
                    <tbody class="list">
                    @foreach ($groups as $group)
                    <tr class="pr-0">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$group->name}}</td>
                        <td>{{$group->locations->name}}</td>
                        <td>{{\Carbon\Carbon::parse($group->created_at)->diffForHumans()}}</td>
                       
                        <td>
                        <a class="btn btn-primary" href="{{route("groups.view",[$group->id,md5($group->name)])}}" ></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
                       
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