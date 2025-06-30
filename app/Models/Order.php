<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "notes",
        "amount",
        "room_id",
        "user_id",
        "date" => 'now()',
        "created_at" => 'now()',
        "updated_at" => 'now()',
    ];
}
