@extends('layouts.app')
@section('content')
<div class="row my-3">
       
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

<div class="h4 col-8 px-5">Zone Details</div>
<div class="col px-4 mx-4 mb-2">
 <a href="{{route('zones.create')}}" class="btn btn-primary ml-5">+</a>
 
</div>
  
<div class="card border-0 shadow-lg">
        <div class="card-body">
            <table class="table table-stripped">
                <tr>
                    <th>ID</th>
                    <th>Zone Name</th>
                    <th>Action</th>
                </tr>
                  @if($zones->isNotEmpty())
                @foreach ($zones as $zone)
                <tr>
                    <td>{{$zone->id}}</td>
                    <td>{{$zone->name}}</td>
                    <td>
                   <a href="{{route('zones.edit',$zone->id)}}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{route('zones.destroy',$zone->id)}}" class="btn btn-success btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
                @else
           <td colspan="3">
                Record Not Found</td>
                @endif
            </table>
             
</div>
</div>
@endsection
