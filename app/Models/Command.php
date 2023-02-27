<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Command extends Model
{
    use HasFactory;

    protected $table = 'Command';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $casts = [
        'id' => 'string',
        'uses' => 'integer',
        'enabled' => 'boolean',
    ];
}
