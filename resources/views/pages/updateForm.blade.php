@extends('layout.app')

@section('content')

<form action="{{route('edited',['id'=>$cat->id])}}" method="post" enctype="multipart/form-data">  
 
    @csrf
   <div class="form-group col-md-6 mt-5 offset-3">
    <h1 class="text-center m-4 text-secondary">Update category: {{$cat->id}}</h1>
    <div class="mt-5">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="name" value="{{$cat->name}}"   placeholder="Name">
            <label for="floatingInput">Name</label>
          </div>
          <div>
            <input type="file" class="form-control mb-2" value="" name="image"  />
        </div>
          <div class="form-floating mb-2">
            <input type="text" class="form-control" name="page_type" value="{{$cat->page_type}}"   placeholder="page type">
            <label for="floatingInput">page type</label>
          </div>
          <div class="form-floating mb-2" >
            <input type="text" class="form-control" name="jsonurl"  value="{{$cat->jsonurl}}" placeholder="json url">
            <label for="floatingInput">jsonurl</label>
          </div>
        
        <button class="btn  btn-warning form-control "> Update</button>
    </div>
   </div>
</form>

@endsection