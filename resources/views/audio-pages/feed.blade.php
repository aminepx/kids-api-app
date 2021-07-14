@extends('layout.app')

@section('content')

<div class="float-end mt-2 me-5">
  <a href="{{route('add-audio')}}"> <button class="btn btn-primary"> Add New Audio</button></a>
</div>
@foreach ($audios as $audio)
<table class="table w-75 mt-5 m-auto">
  <thead>
    <tr>
      <th style="width: 200px" scope="col">ID</th>
      <th style="width: 200px" scope="col">Title</th>
      <th style="width: 200px" scope="col">Image</th>
      <th style="width: 200px" scope="col">Description</th>
      <th style="width: 200px"></th>
    </tr>

  </thead>
  <tbody>
  <tr >
      <th scope="row">{{$audio->id}}</th>
      <td style="width: 250px">{{$audio->title}}</td>
      <td style="width: 250px"><img src="{{$audio->image }}" width="100px" height="70px"  alt=""></td>
      <td style="width: 250px">{{$audio->description}}</td>
      <td style="width: 250px" > <span class="d-flex">
        <form action="{{route('delete',['id'=>$audio->id])}}"  method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger me-1"><i class="fas fa-trash-alt"></i></button>
            </form>
    <a href="{{route('addurl',['id'=>$audio->id])}}"><button class="btn btn-info">add</button></a>
      </td>
          

    
    
  </tr>
   
  </tbody>
</table>

    @endforeach


@endsection