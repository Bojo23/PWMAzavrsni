<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'number',
        'count',
        'buyer',
        'datetime',
        'done'
    ];

    
    public function products()
    {
        
        return $this->belongsToMany(Product::class);
    }
}
