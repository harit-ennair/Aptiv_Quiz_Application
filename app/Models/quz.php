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

    // Relationships
    public function category()
    {
        return $this->belongsTo(categories::class, 'categories_id');
    }

    public function repos()
    {
        return $this->hasMany(repo::class, 'quz_id');
    }

    public function tests()
    {
        return $this->belongsToMany(test::class, 'test_quz', 'quz_id', 'test_id');
    }
}
