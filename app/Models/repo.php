<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class repo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'description',
        'quz_id',
        'status',
        'create_at',
    ];

//     - id : Integer
// - description : String
// - quz_id : Integer
// - status : bool
// - create_at : date
}
