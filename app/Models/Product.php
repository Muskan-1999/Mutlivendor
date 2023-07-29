<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'vendor_id', 'zone_id'];

    // Define the many-to-one relationship with Vendor model
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    // Define the many-to-one relationship with Zone model
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    // Define the one-to-many relationship with ProductPrice model
    public function productPrices()
    {
        return $this->hasMany(ProductPrice::class);
    }
}
