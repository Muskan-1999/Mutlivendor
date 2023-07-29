<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['code', 'exchange_rate'];

    // Define the one-to-many relationship with ProductPrice model
    public function productPrices()
    {
        return $this->hasMany(ProductPrice::class);
    }
}
