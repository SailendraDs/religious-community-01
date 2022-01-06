@extends('layouts.app')
@section("title","Your Campaigns")
@section('content')
<div class="container page__container page-section pb-0">
    <h1 class="h2 mb-0">Campaigns</h1>
    

    <div class="container page__container page-section">

        <div class="page-separator">
            <div class="page-separator__text">Campaigns</div>
        </div>

        <div class="card dashboard-area-tabs p-relative o-hidden mb-lg-32pt">
            <div class="card-header">
                <a href="{{route("user.campaigns.create")}}" class="btn btn-primary">Create new campaign</a>
            </div>
            <div class="table-responsive">
                @if($campaigns->count()===0)
                <p>No campaigns found.</p>
                @else
                <table class="table mb-0 thead-border-top-0 table-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th></th>
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
                            <form action="{{route("user.campaigns.delete")}}" method="post">
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

            <div class="card-footer p-8pt">

             

            </div>

        </div>

    </div>
</div>
@endsection