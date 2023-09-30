@extends('layout.master')
@section('title' , 'Exam ongoing')
@section('styles')
    <link rel="stylesheet" href="style.css">
@endsection
{{$heading = ""}}
@section('content')
    <h1 class="heading text-center mt-3"></h1>
    <div class="msg"></div>
    <div class="main-container center">
        <!-- progress indicator -->
        <div class="circle-container center">
            <div class="semicircle"></div>
            <div class="semicircle"></div>
            <div class="semicircle"></div>
            <div class="outermost-circle">
                
            </div>
        </div>


        <!-- timer -->
        <div class="timer-container center">
            <div class="timer center">

            </div>
        </div>

    </div>

    @section('scripts')
        <script>
          var data  = <?= $exam ?>;
        </script>
        <script src="script.js"></script>
    @endsection
@endsection
