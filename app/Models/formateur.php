<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formateur extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'name',
        'identification',
    ];

//     - id : Integer
// - name : String
// - create_at : date
}
