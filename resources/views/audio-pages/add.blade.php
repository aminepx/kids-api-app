@extends('layout.app')

@section('content')

<form action="{{route('save-audio')}}" method="post" enctype="multipart/form-data">  
 
    @csrf
   <div class="form-group col-md-6 mt-5 offset-3">
    <div class="mt-5">
        <div class="form-floating mb-2">
            <input type="text" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" name="title"  placeholder="title">
            @error('title')
               <div class="alert alert-danger">{{$message}}</div> 
            @enderror
            <label for="floatingInput">Title</label>
          </div>
          <div class="mb-2 @error('image') is-invalid @enderror">
            <input type="file" value="{{old('image')}}" class="form-control" name="image"  placeholder="Image">
            @error('image')
               <div class="alert alert-danger">{{$message}}</div> 
            @enderror
        </div>
        
          <div class="form-floating mb-2">
            <input type="text" value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror" name="description"  placeholder="description">
            @error('description')
               <div class="alert alert-danger">{{$message}}</div> 
            @enderror
            <label for="floatingInput">description</label>
          </div>
        <button class="btn  btn-success form-control mt-2 "> Add</button>
    </div>
   </div>
</form>

@endsection