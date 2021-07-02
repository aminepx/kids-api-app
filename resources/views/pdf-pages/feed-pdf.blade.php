@extends('layout.app')

@section('content')

<div class="float-end mt-2 me-5">
  <a href="{{route('add-pdf')}}"> <button class="btn btn-primary"> Add New PDF</button></a>
</div>

@foreach ($pdf as $file)
<table class="table w-75 mt-5 m-auto">
  <thead>
    <tr>
      <th style="width: 200px" scope="col">ID</th>
      <th style="width: 200px" scope="col">Title</th>
      <th style="width: 200px" scope="col">Image</th>
      <th style="width: 200px" scope="col">Pdf Url</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <tr >
      <th scope="row">{{$file->id}}</th>
      <td style="width: 250px">{{$file->title}}</td>
      <td style="width: 250px">  <img src="{{asset('pdf/images/'.$file->image) }}" width="100px" height="70px"  alt=""></td>
      <td style="width: 250px"><a href="{{url('/download',$file->pdfUrl)}}">{{$file->pdfUrl}}</a></td>
      <td style="width: 250px"> <span class="d-flex">
        <form action="{{route('deletepdf',['id'=>$file->id])}}"  method="post">
            @csrf
            @method('DELETE')
            <a href="{{route('deletepdf',$file->id)}}"></a> <button class="btn btn-danger me-1">Delete</button>
            </form>
          </td>
  </tr>
  </tbody>
</table>
    @endforeach
@endsection