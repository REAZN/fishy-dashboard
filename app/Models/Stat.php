<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;

    protected $table = 'Stat';

    protected $keyType = 'string';

    public $timestamps = false;

    protected $casts = [
        'id' => 'string',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profileId', 'id');
    }
}
