@extends('layout.app')

@section('content')

<form action="{{route('save-pdf')}}" method="post" enctype="multipart/form-data">  
 
    @csrf
   <div class="form-group col-md-6 mt-5 offset-3">
    
    <div class="mt-5">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="title" placeholder="Title">
            <label for="floatingInput">Title</label>
          </div>
        <label for="formFile" class="form-label"> Image :</label>
        <input type="file" class="form-control mt2" name="image"/>
        <label for="formFile" class="form-label">PDF :</label>
        <input type="file" class="form-control mt-2" name="pdfUrl">
        <button class="btn  btn-success form-control mt-2 "> Add</button>
    </div>
   </div>
</form>

@endsection