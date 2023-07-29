@extends('layouts.app')
@section('content')

<div class="container ">
    <div class="d-flex justify-content-between  py-3">
    <div class="h4">EDIT ZONE</div>
    <div><a href="{{route('zones.index')}}" class="btn btn-primary">Back</a></div>
    </div>

    <form action="{{route('zones.update',$zone->id)}}" method="post"   enctype="multipart/form-data">
        @csrf
        @method('put')
      <div class="card border-0 shadow-lg">
          <div class="card-body">


@if(Session::has('error'))
<div class="alert alert-danger">
{{Session::get('error')}}
</div>
@endif

            <div class="mb-3">
              <label for="name" class="form-label">Zone Name</label>
              <input type="text" name="name" id="name" 
              placeholder="Enter your Zone" class="form-control
              @error('name') is-invalid @enderror"   value="{{old('name',$zone->name)}}" >
              @error('name')
              <p class="invalid-feedback">{{$message}}</p>
              @enderror
            </div>

        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Save Details</button>
</form>
@endsection