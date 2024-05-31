<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory,Filterable;

    protected $fillable = [
        'title',
        'description',
        'image',
        'start_date',
        'end_date',
        'status',
    ];
}
