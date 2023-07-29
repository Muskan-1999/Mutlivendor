<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Currency;
use App\Models\Zone;
use App\Models\Vendor;
use App\Services\CurrencyConversionService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendor::all();
        $zones = Zone::all();
        $currencies = Currency::all();
        return view('admin.products.create', compact('vendors', 'zones', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());

        // Save the product prices for different currencies
        foreach ($request->input('prices') as $currencyCode => $price) {
            $currency = Currency::where('code', $currencyCode)->first();
            if ($currency) {
                $product->productPrices()->create([
                    'currency_id' => $currency->id,
                    'price' => $price,
                ]);
            }
    }
    return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $products = Product::all();
        $vendors = Vendor::all();
        $zones = Zone::all();
        return view('admin.products.filter', compact('products','zones','vendors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vendors = Vendor::all();
        $zones = Zone::all();
        $currencies = Currency::all();
        return view('admin.products.edit', compact('product', 'vendors', 'zones', 'currencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product->update($request->all());

        // Update the product prices for different currencies
        foreach ($request->input('prices') as $currencyCode => $price) {
            $currency = Currency::where('code', $currencyCode)->first();
            if ($currency) {
                $product->productPrices()->updateOrCreate(
                    ['currency_id' => $currency->id],
                    ['price' => $price]
                );
            }
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function filter(Request $request)
    {
        // Get the selected zone and vendor IDs from the form
        $zoneId = $request->input('zone');
        $vendorId = $request->input('vendor');

        // Fetch products based on the selected zone or vendor
        if ($zoneId && !$vendorId) {
            $products = Product::where('zone_id', $zoneId)->get();
        } elseif (!$zoneId && $vendorId) {
            $products = Product::where('vendor_id', $vendorId)->get();
        } elseif ($zoneId && $vendorId) {
            $products = Product::where('zone_id', $zoneId)
                              ->where('vendor_id', $vendorId)
                              ->get();
        } else {
            // If no filter selected, fetch all products
            $products = Product::all();
        }

        // Fetch all zones and vendors to populate the dropdowns again
        $zones = Zone::all();
        $vendors = Vendor::all();

        // Convert product prices to the selected zone's currency
        $selectedZone = Zone::find($zoneId);
        $currencyConversionService = new CurrencyConversionService(); // Replace this with your CurrencyConversionService logic
        foreach ($products as $product) {
            $product->convertedPrice = $currencyConversionService->convert($product->price, $selectedZone->currency, $baseCurrency);
        }

        // Return the data to the view
        return view('admin.products.filter', compact('products', 'zones', 'vendors'));
    }
}
