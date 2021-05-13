<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function getDisplayNameAttribute() : string {
        return $this->user->name;
    }
    public function getEmailAttribute() : string{
        return $this->user->email;
    }
    public function getPasswordAttribute() : string{
        return $this->user->password;
    }
}
