<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class repo extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer_text',
        'quz_id',
        'is_correct',
    ];

    // Relationships
    public function quz()
    {
        return $this->belongsTo(quz::class, 'quz_id');
    }
}
