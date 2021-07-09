@extends('layout.app')

@section('content')

<form action="{{route('save')}}" method="post" enctype="multipart/form-data">  
 
    @csrf
   <div class="form-group col-md-6 mt-5 offset-3">
    <div class="mt-5">
        <div class="form-floating mb-2">
            <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Name">
            @error('name')
               <div class="alert alert-danger">{{$message}}</div> 
            @enderror
            <label for="floatingInput">Name</label>
          </div>
          <div class="mb-2 @error('image') is-invalid @enderror">
            <input type="file" value="{{old('image')}}" class="form-control" name="image"  placeholder="Image">
            @error('image')
               <div class="alert alert-danger">{{$message}}</div> 
            @enderror
        </div>
          <div class="form-floating mb-2">
            <input type="text" value="{{old('page_type')}}" class="form-control @error('page_type') is-invalid @enderror" name="page_type"  placeholder="page type">
            @error('page_type')
               <div class="alert alert-danger">{{$message}}</div> 
            @enderror
            <label for="floatingInput">page type</label>
          </div>
          <div class="form-floating mb-2">
            <input type="text" readonly value="{{url('188.166.93.170:9000/api/allcat')}}" class="form-control @error('jsonurl') is-invalid @enderror" name="jsonurl"  placeholder="json url">
            @error('jsonurl')
               <div class="alert alert-danger">{{$message}}</div> 
            @enderror
            <label for="floatingInput">jsonurl</label>
          </div>
        <button class="btn  btn-success form-control mt-2 "> Add</button>
    </div>
   </div>
</form>

@endsection