<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = ['name'];

    // Define the inverse one-to-many relationship with Product model
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
