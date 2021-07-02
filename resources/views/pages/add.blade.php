@extends('layout.app')

@section('content')

<form action="{{route('save')}}" method="post" enctype="multipart/form-data">  
 
    @csrf
   <div class="form-group col-md-6 mt-5 offset-3">
    
    <div class="mt-5">
        <input type="text" class="form-control "  placeholder="name" name="name">
        <input type="file" id="photo" class="form-control "   name="image" />
        <input type="text" class="form-control "  placeholder="page type" name="page_type">
        <input type="text" class="form-control "  placeholder="json url" name="jsonurl">
        <button class="btn  btn-success form-control mt-2 "> Add</button>
    </div>
   </div>
</form>

@endsection