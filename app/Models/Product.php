<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::addGlobalScope('ancient', function (Builder $builder) {
            $builder->where('client_id', Auth::user()->client->id);
        });
    }

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
