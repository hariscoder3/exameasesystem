@extends('layout.master')
@section('title' , "UMC cases")
@section('content')
@php 
$assoc_array = ["Roll-Number"=>"12345678"];
$i = 0;
@endphp
    @if (Session::has('info'))
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-info">{{Session::get('info')}}</div>
            </div>
        </div> 
    @endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Roll Number</th>
      <th scope="col">Opeartion</th>
    </tr>
  </thead>
  <tbody>

    @foreach($umc_all as $umc)
    <tr>
      <th scope="row">{{$umc->id}}</th>
      <td>{{$umc->roll_number}}</td>
      <td>
        <a href="{{route('delete-umc.delete',['id'=>$umc->id])}}">Delete</a>
      </td>
    </tr>
    @endforeach
   
  </tbody>
</table>
@endsection