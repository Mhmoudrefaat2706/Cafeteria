<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
class Order extends Model
{
    protected $fillable = [
        "notes",
        "amount",
        "room_id",
        "user_id",
        "quantity",
        "date" => 'now()',
        "created_at" => 'now()',
        "updated_at" => 'now()',
    ];

    public function products(){
        return $this->belongsToMany(Product::class)
        ->withPivot('quantity','price','name')->withTimestamps();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
