@extends('layouts.app')

@section('content')
    <h2>Products</h2>

    <form action="{{ route('products.filter') }}" method="get">
        <div class="form-group">
            <label for="zone">Select Zone:</label>
            <select name="zone" id="zone" class="form-control">
                <option value="">All Zones</option>
                @foreach ($zones as $zone)
                    <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="vendor">Select Vendor:</label>
            <select name="vendor" id="vendor" class="form-control">
                <option value="">All Vendors</option>
                @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Zone</th>
                <th>Vendor</th>
                <th>Price (Original)</th>
                <th>Price (Converted)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->zone->name }}</td>
                    <td>{{ $product->vendor->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->convertedPrice }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection