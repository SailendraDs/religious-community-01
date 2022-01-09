@extends('layouts.app')
@section("title","GroupAdmins")
@section('content')

    <div class="container-fluid">
        <h2 class="mb-4">Group Admins List</h2>
            
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
            Group Admins
            </div>
            <div class="card-body">
                @if($groupadmins->count()===0)
                    <h2 class="text-center">No Data Available</h2>
                @else
                    <table class="table  table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Group ID</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($groupadmins as $groupadmin)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <th scope="row">{{$groupadmin->name}}</th>
                                <th scope="row">{{$groupadmin->username}}</th>
                                <th scope="row">{{$groupadmin->group_id}}</th>
                                <th scope="row">{{$groupadmin->email}}</th>
                                <th scope="row">
                                    <form action="{{route('admin.groupadmins.delete')}}" method="post">
                                    @csrf
                                        <input type="hidden" name="id" value="{{$groupadmin->id}}">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </th>
                                
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @endif
            
            </div>
        </div>
    </div>
    
    
@endsection