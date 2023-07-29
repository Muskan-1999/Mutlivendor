<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productprice extends Model
{
    protected $fillable = ['product_id', 'currency_id', 'price'];

    // Define the many-to-one relationship with Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Define the many-to-one relationship with Currency model
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
    
}
