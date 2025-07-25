<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class process extends Model
{
    use HasFactory;
protected $fillable = [
        'title',
        'description',
        'create_at',
    ];

    // Relationships
    public function categories()
    {
        return $this->hasMany(categories::class, 'process_id');
    }

    public function tests()
    {
        return $this->hasMany(test::class, 'process_id');
    }
}
