@extends('layout.app')

@section('content')

<form action="{{route('save')}}" method="post" enctype="multipart/form-data">  
 
    @csrf
   <div class="form-group col-md-6 mt-5 offset-3">
    
    <div class="mt-5">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="name"  placeholder="Name">
            <label for="floatingInput">Name</label>
          </div>
          <div class="mb-2">
            <input type="file" class="form-control" name="image"  placeholder="Image">
        </div>
          <div class="form-floating mb-2">
            <input type="text" class="form-control" name="page_type"  placeholder="page type">
            <label for="floatingInput">page type</label>
          </div>
          <div class="form-floating mb-2">
            <input type="text" class="form-control" name="jsonurl"  placeholder="json url">
            <label for="floatingInput">jsonurl</label>
          </div>
        <button class="btn  btn-success form-control mt-2 "> Add</button>
    </div>
   </div>
</form>

@endsection