@extends('layout.app')

@section('content')

<form action="{{route('save-pdf')}}" method="post" enctype="multipart/form-data">  
 
    @csrf
   <div class="form-group col-md-6 mt-5 offset-3">
    
    <div class="mt-5">
        <input type="text" class="form-control mb-2"  placeholder="Title" name="title">
        <input type="file" class="form-control mt2" name="image"/>
        <input type="file" class="form-control mt-2" name="pdfUrl">
        <button class="btn  btn-success form-control mt-2 "> Add</button>
    </div>
   </div>
</form>

@endsection