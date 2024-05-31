<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Filterable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'phone',
        'image',
        'gender',
        'email',
        'email_verified_at',
        'password',
        'type'
    ];

    // public function scopeFilter(Builder $builder,$filters)
    // {

    //     $builder->when($filters['first_name']?? false,function($builder,$value)
    //     {
    //         $builder->where('first_name','like',"%{$value}%");
    //     });
    //     $builder->when($filters['type']?? false,function($builder,$value)
    //     {
    //         $builder->where('type','=',$value);
    //     });
        
        
    //    if($filters['first_name'] ?? false)
    //    {
    //     $builder->where('first_name','like',"%{$filters['first_name']}%");
    //    }
    //    if($filters['type'] ?? false)
    //    {
    //     $builder->where('type','=',$filters['type']);
    //    }
    //}

    
    public function child()
    {
        return $this->hasOne(Child::class); // A user can have one child
    }

    public function forebear()
    {
        return $this->hasOne(Forebear::class); // A user can have one forebear
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
