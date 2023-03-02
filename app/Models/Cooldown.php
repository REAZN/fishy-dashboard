<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cooldown extends Model
{
    use HasFactory;

    protected $table = 'Cooldown';

    protected $keyType = 'string';

    public $timestamps = false;

    protected $casts = [
        'id' => 'string',
        'date' => 'datetime',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profileId', 'id');
    }
}
