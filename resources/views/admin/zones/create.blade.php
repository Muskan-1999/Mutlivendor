@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body>
  @if(Session::has('success'))
<div class="alert alert-success">
  {{Session::get('success')}}
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger">
{{Session::get('error')}}
</div>
@endif

    
    <div class="container ">
    <div class="d-flex justify-content-between  py-3">
    <div class="h4">CREATE ZONE</div>
    <div><a href="{{route('zones.index')}}" class="btn btn-primary">Back</a></div>
    </div>
<form action="{{route('zones.store')}}"  method="post" enctype="multipart/form-data">
    @csrf
  <div class="card border-0 shadow-lg">
      <div class="card-body">
        <div class="mb-3">
          <label for="name" class="form-label">Zone Name</label>
          <input type="text" name="name" id="name" 
          placeholder="Enter your Zone" class="form-control
          @error('name') is-invalid @enderror" >
          @error('name')
          <p class="invalid-feedback">{{$message}}</p>
          @enderror
          </div>
        </div>
  </div>
  <button class="btn btn-primary">Save Details</button>
</form>
    </div>
    @endsection