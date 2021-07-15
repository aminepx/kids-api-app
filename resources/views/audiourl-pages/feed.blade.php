@extends('layout.app')

@section('content')

<div class="float-end mt-2 me-5">

</div>
@foreach ($audiourls as $audiourl)
@if ($audiourl->audio_id==$_GET['id'])
    

<table class="table w-75 mt-5 m-auto">
  <thead>
    <tr>
      <th style="width: 200px" scope="col">ID</th>
      <th style="width: 200px" scope="col">Title</th>
      <th style="width: 200px" scope="col">Audio</th>
      <th style="width: 200px"></th>
    </tr>
  </thead>
  <tbody>
  <tr >
      <th scope="row">{{$audiourl->id}}</th>
      <td style="width: 250px">{{$audiourl->title}}</td>
      <td style="width: 250px"><a href="">{{$audiourl->audio}}</a></td>
      <td style="width: 250px" > <span class="d-flex">
        <form action="{{route('deleteurl',['id'=>$audiourl->id])}}"  method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger me-1"><i class="fas fa-trash-alt"></i></button>
            </form>
    
      </td>
          

    
    
  </tr>
   
  </tbody>
</table>
@endif

    @endforeach


@endsection