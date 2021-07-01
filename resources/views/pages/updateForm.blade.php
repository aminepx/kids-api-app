@extends('layout.app')

@section('content')

<form action="{{route('edited',['id'=>$cat->id])}}" method="post" enctype="multipart/form-data">  
 
    @csrf
   <div class="form-group col-md-6 mt-5 offset-3">
    <h1 class="text-center m-4 text-secondary">Update category: {{$cat->id}}</h1>
    <div class="mt-5">
        <input type="text" class="form-control " value="{{$cat->name}}" placeholder="name" name="name">
        <input type="file"  name="image"/>
        <input type="text" class="form-control " value="{{$cat->page_type}}" placeholder="page type" name="page_type">
        <input type="text" class="form-control " value="{{$cat->jsonurl}}" placeholder="json url" name="jsonurl">
        <button class="btn  btn-warning "> Update</button>
    </div>
   </div>
</form>

@endsection