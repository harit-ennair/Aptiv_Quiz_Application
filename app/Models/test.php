<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    use HasFactory;

        protected $fillable = [
        'user_id',
        'quz_id',
        'description',
        'formateur_id',
        'pourcentage',

    ];


//     - test_id : Integer
// - user_id : Integer
// - quz_id : Integer
// - description : String
// - formateur_id : Integer
// - resultat : integer
// - pourcentage : integer
// - create_at : date
}
