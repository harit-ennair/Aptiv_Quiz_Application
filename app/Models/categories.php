<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'create_at',
    ];
//     - id : Integer
// - title : String
// - create_at : date
}
