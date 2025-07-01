<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Product extends Model
{
    protected $fillable = [
        "name",
        "price",
        "image",
        "description",
        "category_id",
    ];
    public function orders(){
        return $this->belongsToMany(Order::class)
        ->withPivot('quantity','price','name')->withTimestamps();
    }
}
