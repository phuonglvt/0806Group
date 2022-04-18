<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    const SUPPORT = 'support';
    const ACADEMIC = 'academic';

    protected $fillable = [
        'name',
    ];

    // public function missions()
    // {
    //     return $this->hasMany(Mission::class);
    // }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function ideas()
    {
        return $this->hasManyThrough(Idea::class, User::class);
    }
}
