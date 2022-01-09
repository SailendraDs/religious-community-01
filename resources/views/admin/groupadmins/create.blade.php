@extends('layouts.app')
@section("title","GroupAdmins")
@section('content')
<div>
        <div>
            <div>
                <div class="header">
                    <h4 class="title" id="">Create a new Group Admin</h4>
                </div>
                <form action="{{route('admin.groupadmins.create')}}" method="post">
                    @csrf
                    <div class="">
                        <div class="input-group mb-2">
                            <input type="text" placeholder="Enter Manager Name" name="name" class="form-control">
                        </div>
                        <div class="input-group mb-2">
                            <input type="email" placeholder="Enter Manager Email" name="email" class="form-control">
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" placeholder="Enter Manager Username" name="username" class="form-control">
                        </div>
                        <div class="input-group mb-2">
                            <input type="password" placeholder="Enter Manager Password" name="password" class="form-control">
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" placeholder="Enter Manager Phone" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                <label class="form-label" for="group_id">Group:</label>
                <select name="Group" id="group_id" class="custom-select">
                    <option value="">Select a Group</option>
                    @foreach ($groups as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                    @endforeach
                </select>
            </div>
                    </div>
                    <div class="footer">
                        
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
