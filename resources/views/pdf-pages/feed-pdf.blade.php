@extends('layout.app')

@section('content')

<div class="float-end mt-2 me-5">
  <a href="{{route('add-pdf')}}"> <button class="btn btn-primary"> Add New PDF</button></a>
</div>

@foreach ($pdf as $file)
<table class="table w-75 mt-5 m-auto">
  <thead class="">
    <tr>
      <th scope="col">ID</th>
      <th style="width: 200px" scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Pdf Url</th>
      <th></th>
    </tr>
  </thead>
  <tbody class="">
  <tr >
      <th scope="row">{{$file->id}}</th>
      <td style="width: 200px">{{$file->title}}</td>
      <td>  <img src="{{asset('pdf/images/'.$file->image) }}" width="100px"  alt=""></td>
      <td><a href="{{url('/download',$file->pdfUrl)}}">{{$file->pdfUrl}}</a></td>
      <td> <span class="d-flex">
        <form action="{{route('deletepdf',['id'=>$file->id])}}"  method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger me-1">Delete</button>
            </form>
          </td>
    <td>

    </td>

    
    
  </tr>
   
  </tbody>
</table>
    @endforeach


@endsection