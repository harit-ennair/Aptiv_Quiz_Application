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
        'process_id',
        'category_id',
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

    public function process()
    {
        return $this->belongsTo(process::class, 'process_id');
    }

    public function category()
    {
        return $this->belongsTo(categories::class, 'category_id');
    }

    public function quzs()
    {
        return $this->belongsToMany(quz::class, 'test_quz', 'test_id', 'quz_id');
    }
}
