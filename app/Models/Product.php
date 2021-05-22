<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function client() : BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function getPriceAttribute($price) : float{
        return (float)$price/100;
    }

    public function setPriceAttribute(float $price) : void {
        $this->attributes['price'] = $price * 100;
    }
}
