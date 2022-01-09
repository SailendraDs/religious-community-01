@extends('layouts.app')
@section("title","Create Campaign")
@section('content')
<div class="container page__container page-section pb-0">
    <h1 class="h2 mb-0">Campaign</h1>
    
    <div class="container page__container page-section">

        <div class="page-separator">
            <div class="page-separator__text">Create a new Campaign</div>
        </div>
        <form action="{{route("user.campaigns.create")}}" onsubmit="checkImages(event)" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label" for="title">Title:</label>
                <input id="title" type="text" class="form-control" name="title" placeholder="Webinar title ...">
            </div>
            <div class="form-group">
                <label class="form-label" for="description">Description:</label>
                <textarea name="description" id="description"></textarea>
            </div>
            <div class="form-group">
                <label class="form-label" for="images[]">Images:</label>
                <input id="images" type="file" accept=".png,.jpeg,.jpg" multiple class="form-control" name="images[]">
            </div>
            <div class="form-group">
                <label class="form-label" for="thumbnail">Thumbnail:</label>
                <input id="thumbnail" type="file" accept=".png,.jpeg,.jpg" class="form-control" name="thumbnail">
            </div>
            <div class="form-group">
                <label class="form-label" for="category">Category:</label>
                <select name="category" id="category" class="custom-select">
                    <option value="">Select a category</option>
                    @foreach ($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
           
            <div class="form-group">
                <label class="form-label" for="instructions">Instructions:</label>
                <textarea name="instructions" id="instructions"></textarea>
            </div>
            
            <button class="btn btn-primary">Submit</button>
        </form>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
<script>
ClassicEditor
    .create( document.querySelector( '#description' ) )
    .create( document.querySelector( '#instructions' ) )
    .catch( error => {
        console.error( error );
    });
function checkImages(e){
    var $fileUpload = $("#images");
    if (parseInt($fileUpload.get(0).files.length)>4){
        e.preventDefault()
        alert("You can only upload a maximum of 4 files");
        return false;
    }
    else{
        return true;
    }
}
</script>
@endsection