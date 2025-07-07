<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Order extends Model
{
    protected $fillable = [
        "notes",
        "name",
        "amount",
        "room_id",
        "user_id",
        "status",
        "quantity",
        "status",
        "date" => 'now()',
        // "created_at" => 'now()',
        // "updated_at" => 'now()',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

public function products()
{
    return $this->belongsToMany(Product::class, 'order_product')
        ->withPivot('quantity', 'price', 'name')
        ->withTimestamps();
}




    public function canBeCancelled()
    {
        return $this->status === 'processing';
    }
    // ma
    public function orderDetails()
    {
        return $this->hasMany(OrderProduct::class);
    }



}
