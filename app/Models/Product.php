<?php

namespace App\Models;

use App\Models\ProductType;
use EloquentFilter\Filterable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Filterable;

    protected $guarded = ['id'];

    protected $with = ['type'];

    protected static function booted()
    {
        // static::addGlobalScope('ancient', function (Builder $builder) {
        //     $builder->where('client_id', Auth::user()->client->id);
        // });
    }

    public function client() : BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function type() : BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }
}
