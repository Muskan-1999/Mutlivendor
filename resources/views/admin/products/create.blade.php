@extends('layouts.app')

@section('content')
    <h2>Add New Product</h2>

    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="vendor_id">Vendor</label>
            <select name="vendor_id" id="vendor_id" class="form-control" required>
                @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="zone_id">Zone</label>
            <select name="zone_id" id="zone_id" class="form-control" required>
                @foreach ($zones as $zone)
                    <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="prices">Product Prices (in different currencies)</label>
            @foreach ($currencies as $currency)
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">{{ $currency->code }}</span>
                    </div>
                    <input type="number" name="prices[{{ $currency->code }}]" class="form-control" required>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Save Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection