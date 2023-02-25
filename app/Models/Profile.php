<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'Profile';

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function stats()
    {
        return $this->hasMany(Stat::class, 'profileId');
    }

    public function cooldowns()
    {
        return $this->hasOne(Cooldown::class, 'profileId');
    }

    public function fish()
    {
        return $this->hasMany(FishInventory::class, "profileId", "id");
    }

    public function items()
    {
        return $this->hasMany(ItemInventory::class, "profileId", "id");
    }
}
