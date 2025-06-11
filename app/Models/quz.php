<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quz extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'categories_id',
    ];


//     - id : Integer
// - description : String
// - repo_id : Integer 
// - categories_id : Integer 
// - create_at : date
}
