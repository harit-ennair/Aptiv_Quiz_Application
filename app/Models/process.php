<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class process extends Model
{
    use HasFactory;
protected $fillable = [
        'title',
        'categories_id',
        'create_at',
    ];

// - id : Integer
// - title : String
// - process_id : Integer
// - create_at : date
}
