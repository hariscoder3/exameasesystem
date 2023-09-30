@extends('layout.master')
@section('title' , 'Add Exam')
@section('content')
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form action="{{url('/')}}/store" method="post">
                @csrf
                <!-- @php
                  print_r($errors->all());
                @endphp -->
                <div class="mb-3">
                  <label for="course-name" class="form-label">Course Name:</label>
                  <input type="text"
                    class="form-control" name="course_name" id="course-name" aria-describedby="helpId" placeholder="Enter the Course Name" value="{{old('course_name')}}">
                    <span class="text-danger">
                      @error('course_name')
                        {{$message}}
                      @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exam-date" class="form-label">Enter Exam Date:</label>
                    <input type="date"
                      class="form-control" name="exam_date" id="exam-date" aria-describedby="helpId" placeholder="Enter the Exam Date" value="{{old('exam_date')}}">
                      <span class="text-danger">
                      @error('exam_date')
                        {{$message}}
                      @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="start-time" class="form-label">Enter Exam Start Time:</label>
                    <input type="time"
                      class="form-control" name="start_time" id="start-time" aria-describedby="helpId" placeholder="Enter Exam Start Time" value="{{old('start_time')}}">
                      <span class="text-danger">
                      @error('start_time')
                        {{$message}}
                      @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="end-time" class="form-label">Enter Exam End Time:</label>
                    <input type="time"
                      class="form-control" name="end_time" id="end-time" aria-describedby="helpId" placeholder="Enter Exam End Time" value="{{old('end_time')}}">
                      <span class="text-danger">
                      @error('end_time')
                        {{$message}}
                      @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="present-students" class="form-label">Present Students:</label>
                    <input type="number"
                      class="form-control" name="present_students" id="present-students" aria-describedby="helpId" placeholder="Enter Number of Present Students" value="{{old('present_students')}}">
                      <span class="text-danger">
                      @error('present_students')
                        {{$message}}
                      @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="leave-time" class="form-label">Student Leave Time(Maximum):</label>
                    <input type="time"
                      class="form-control" name="leave_time" id="leave-time" aria-describedby="helpId" placeholder="Enter Student Leave Time" value="{{old('leave_time')}}">
                      <span class="text-danger">
                      @error('leave_time')
                        {{$message}}
                      @enderror
                    </span>
                </div>
                
                <button type="submit" class="btn btn-primary">Add Exam</button>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
@endsection
