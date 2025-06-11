<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'create_at',
        'process_id',
    ];

    // Relationships
    public function process()
    {
        return $this->belongsTo(process::class, 'process_id');
    }

    public function quzs()
    {
        return $this->hasMany(quz::class, 'categories_id');
    }
}
