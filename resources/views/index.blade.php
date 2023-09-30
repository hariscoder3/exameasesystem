@extends('layout.master')
@section('title' , "Home")
@section('content')
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
      <th scope="col">Course Name</th>
      <th scope="col">Exam Date</th>
      <th scope="col">Exam Start Time</th>
      <th scope="col">Exam End Time</th>
      <th scope="col">Present Students</th>
      <th scope="col">Students Leave Time</th>
      <th colspan="2" scope="col">Opeartions</th>
    </tr>
  </thead>
  <tbody>

    @foreach($exams as $exam)
    <tr>
      <th scope="row">{{$exam->id}}</th>
      <td>{{$exam->course_name}}</td>
      <td>{{$exam->exam_date}}</td>
      <td>{{$exam->start_time}}</td>
      <td>{{$exam->end_time}}</td>
      <td>{{$exam->present_students}}</td>
      <td>{{$exam->leave_time}}</td>
      <td><a href="{{route('edit-exam.edit',['id'=>$exam->id])}}">Edit</a><td>
      <td><a href="{{route('delete-exam.delete',['id'=>$exam->id])}}">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection