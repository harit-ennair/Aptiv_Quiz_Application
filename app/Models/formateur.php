<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'identification',
    ];

    // Relationships
    public function tests()
    {
        return $this->hasMany(test::class);
    }
}
