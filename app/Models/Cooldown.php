<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooldown extends Model
{
    use HasFactory;

    protected $table = 'Cooldown';

    protected $keyType = 'string';


    protected $casts = [
        'id' => 'string',
        'date' => 'datetime',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profileId', 'id');
    }
}
