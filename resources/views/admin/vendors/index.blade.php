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

<div class="h4 col-8 px-5">Vendor Details</div>
<div class="col px-4 mx-4 mb-2">
 <a href="{{route('vendors.create')}}" class="btn btn-primary ml-5">+</a>
 
</div>
  
<div class="card border-0 shadow-lg">
        <div class="card-body">
            <table class="table table-stripped">
                <tr>
                    <th>ID</th>
                    <th>Vendor Name</th>
                    <th>Action</th>
                </tr>
                  @if($vendors->isNotEmpty())
                @foreach ($vendors as $vendor)
                <tr>
                    <td>{{$vendor->id}}</td>
                    <td>{{$vendor->name}}</td>
                    <td>
                   <a href="{{route('vendors.edit',$vendor->id)}}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{route('vendors.destroy',$vendor->id)}}" class="btn btn-success btn-sm">Delete</a>
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
