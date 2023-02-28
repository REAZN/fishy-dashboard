<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishInventory extends Model
{
    use HasFactory;

    protected $table = 'FishInventory';

    protected $keyType = 'string';


    protected $casts = [
        'id' => 'string',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profileId', 'id');
    }
}
