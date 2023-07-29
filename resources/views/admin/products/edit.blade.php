@extends('layouts.app')

@section('content')
    <h2>Edit Product: {{ $product->name }}</h2>

    <form action="{{ route('products.update', $product->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="vendor_id">Vendor</label>
            <select name="vendor_id" id="vendor_id" class="form-control" required>
                @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->id }}" {{ $product->vendor_id == $vendor->id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="zone_id">Zone</label>
            <select name="zone_id" id="zone_id" class="form-control" required>
                @foreach ($zones as $zone)
                    <option value="{{ $zone->id }}" {{ $product->zone_id == $zone->id ? 'selected' : '' }}>{{ $zone->name }}</option>
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
                    <input type="number" name="prices[{{ $currency->code }}]" class="form-control" value="{{ optional($product->productPrices->where('currency_id', $currency->id)->first())->price }}" required>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection