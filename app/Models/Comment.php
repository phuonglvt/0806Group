<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'idea_id'
    ];

    public function idea() {
        return $this->belongsTo(Idea::class);
    }

    public function user() {
        return $this->belongsTo((User::class));
    }
}
