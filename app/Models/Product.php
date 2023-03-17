<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'group_id',
        'name',
        'slug',
        'description',
        'price'
    ];

  
public function grupas(){
    return $this->hasOne(Grupa::class);
}

}
