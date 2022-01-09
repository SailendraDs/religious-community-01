@extends('layouts.first')
@section("title","My Campaigns")
@section('content')
<div class="appHeader">
        
    </div>
    <!-- searchBox -->
    
<div id="appCapsule">
<div class="appContent">

<div class="sectionTitle mb-2">
               
    <div class="title">
                    <h1>My Created Campaigns</h1>
    </div>
</div>
<div class="card-header">
                <a href="{{route("groups.campaigns.campaigns.create")}}" class="btn btn-primary">Create new campaign</a>
 </div>
<div class="table-responsive">
                @if($campaigns->count()===0)
                <p>No campaigns found.</p>
                @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th></th>
                        </tr>
                    </thead>
                
                    <tbody class="list">
                    @foreach ($campaigns as $campaigns)
                    <tr class="pr-0">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$campaigns->title}}</td>
                        <td>{{$campaigns->category->name}}</td>
                        <td>{{$campaigns->location}}</td>
                       
                        <td>
                            <form action="{{route("groups.campaigns.delete")}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$campaigns->id}}">
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
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