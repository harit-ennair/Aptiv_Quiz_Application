<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    use HasFactory;

        protected $fillable = [
        'user_id',
        'description',
        'formateur_id',
        'pourcentage',
        'resultat',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function formateur()
    {
        return $this->belongsTo(formateur::class, 'formateur_id');
    }

    public function quzs()
    {
        return $this->belongsToMany(quz::class, 'test_quz', 'test_id', 'quz_id');
    }
}
