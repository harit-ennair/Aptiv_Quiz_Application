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

    // Relationships
    public function categories()
    {
        return $this->hasMany(categories::class, 'process_id');
    }
}
