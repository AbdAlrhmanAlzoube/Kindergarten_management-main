<?php

namespace App\Models;

use App\Enum\EducationStage;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Child extends Model
{
    use HasFactory,Filterable;

    protected $fillable = [
        'user_id',
        'forebear_id',
        'age',
        'education_stage'
       
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function forebear()
    {
        return $this->belongsTo(Forebear::class);
    }
}
