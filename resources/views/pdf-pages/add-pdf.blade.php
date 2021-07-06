@extends('layout.app')

@section('content')

<form action="{{route('save-pdf')}}" method="post" enctype="multipart/form-data">  
 
    @csrf
   <div class="form-group col-md-6 mt-5 offset-3">
    
    <div class="mt-5">
        <div class="form-floating mb-2">
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title">
            @error('title')
               <div class="alert alert-danger">{{$message}}</div> 
            @enderror
            <label for="floatingInput">Title</label>
          </div>
        <label for="formFile" class="form-label"> Image :</label>
        <input type="file" class="form-control mt2 @error('image') is-invalid @enderror" name="image"/>
        @error('image')
               <div class="alert alert-danger">{{$message}}</div> 
            @enderror
        <label for="formFile" class="form-label mt-2">PDF URL :</label>
        <input type="file" class="form-control mt-2 @error('readUrl') is-invalid @enderror" name="readUrl">
        @error('readUrl')
               <div class="alert alert-danger">{{$message}}</div> 
            @enderror
        <div class="form-floating mb-1 mt-2">
          <input type="text" class="form-control @error('ageGroup') is-invalid @enderror" name="ageGroup" placeholder="Age">
          @error('ageGroup')
               <div class="alert alert-danger">{{$message}}</div> 
            @enderror
          <label for="floatingInput">Age</label>
        </div>
        <div class="form-floating mb-2">
          <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description">
          @error('description')
               <div class="alert alert-danger">{{$message}}</div> 
            @enderror
          <label for="floatingInput">Description</label>
        </div>
        
        <button class="btn  btn-success form-control mt-2 "> Add</button>
    </div>
   </div>
</form>

@endsection