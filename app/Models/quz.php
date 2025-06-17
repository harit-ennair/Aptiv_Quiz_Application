<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quz extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_text',
        'image_path',
        'categories_id',
    ];

    protected $appends = ['image_url'];

    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/questions/' . $this->image_path) : null;
    }

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
