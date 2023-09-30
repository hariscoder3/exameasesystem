@extends('layout.master')
@section('title' , 'Add UMC')
@section('content')
    <div class="row mt-4">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form action="{{url('/')}}/umc/storeUMC" method="get">
                @csrf
                <div class="mb-3">
                  <label for="roll-number" class="form-label">Enter Student Roll Number:</label>
                  <input type="text"
                    class="form-control" name="roll_number" id="roll-number" aria-describedby="helpId" placeholder="Enter Student Roll Number">
                    <span class="text-danger">
                      @error('roll_number')
                        {{$message}}
                      @enderror
                    </span>
                </div>
                
                <button type="submit" class="btn btn-primary">Add UMC</button>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
@endsection
