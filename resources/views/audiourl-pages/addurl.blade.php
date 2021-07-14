@extends('layout.app')

@section('content')

<form action="{{route('save-url')}}" method="post" enctype="multipart/form-data">  
 
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
          <div class="mb-2 @error('audio') is-invalid @enderror">
            <input type="file" value="{{old('audio')}}" class="form-control" name="audio"  placeholder="audio">
            @error('audio')
               <div class="alert alert-danger">{{$message}}</div> 
            @enderror
        </div>

        <input type="hidden" 
                    value="{{$audios->id}}"
                    class="form-control "
                    name="audio_id"> 
       
        
        <button class="btn  btn-success form-control mt-2 "> Add</button>
    </div>
   </div>
</form>

@endsection