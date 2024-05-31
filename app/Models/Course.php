<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'teacher_id',
        'type',
        'description'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
