<?php

namespace App\Models;
use App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'room_id',
        'ext_num',
        'google_id',
        'facebook_id',
        'avatar',
        'provider',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Check if user is admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }
    // Get user avatar (social or default)
public function getAvatarAttribute($value)
{

    if ($value) {
        return $value;
    }

    return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&background=007bff&color=fff';
}

    public function hasSocialProvider($provider)
    {
        return $this->provider === $provider || $this->{$provider . '_id'};
    }

    // Get social providers
    public function getSocialProviders()
    {
        $providers = [];
        if ($this->google_id) $providers[] = 'google';
        if ($this->facebook_id) $providers[] = 'facebook';
        return $providers;
    }

        public function orders(){
        return $this->hasMany(Order::class);
    }
    // order
    public function ordersWithDetails()
    {
        return $this->hasMany(Order::class)->with('orderDetails.product');
    }
}



