<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Server extends Model
{
    use HasFactory;

    protected $table = 'Server';

    protected $keyType = 'string';

}
