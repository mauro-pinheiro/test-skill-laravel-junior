<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function products() : HasMany {
        return $this->hasMany(Product::class, 'type_product_id');
    }
}
