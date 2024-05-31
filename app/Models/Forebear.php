<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forebear extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'age'
    ];
    public function user()
    {
        return $this->belongsTo(User::class); // A forebear belongs to a user
    }

    public function children()
    {
        return $this->hasMany(Child::class); 
}
}