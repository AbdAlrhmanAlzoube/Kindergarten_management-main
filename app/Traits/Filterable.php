<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    public function scopeFilter(Builder $builder, $filters)
    {
        $builder->when($filters['first_name'] ?? false, function ($builder, $value) {
            $builder->where('first_name', 'like', "%{$value}%");
        });

        $builder->when($filters['type'] ?? false, function ($builder, $value) {
            $builder->where('type', '=', $value);
        });

       
    }
    public function scopeFilterChildren(Builder $builder, $filters)
    {
        // Filtering for Child model
        $builder->when($filters['first_name'] ?? false, function ($builder, $value) {
            $builder->whereHas('user', function ($query) use ($value) {
                $query->where('first_name', 'like', "%{$value}%");
            });
        });

        $builder->when($filters['education_stage'] ?? false, function ($builder, $value) {
            $builder->where('education_stage', '=', $value);
        });
    }
    public function scopeFilterTeachers(Builder $builder, $filters)
    {
        $builder->when($filters['first_name'] ?? false, function ($builder, $value) {
            $builder->whereHas('user', function ($query) use ($value) {
                $query->where('first_name', 'like', "%{$value}%");
            });
        });

        $builder->when($filters['gender'] ?? false, function ($builder, $value) {
            $builder->whereHas('user', function ($query) use ($value) {
                $query->where('gender', '=', $value);
            });
        });
    }
    public function scopeFilterReviews(Builder $builder, $filters)
    {
        $builder->when($filters['first_name'] ?? false, function ($builder, $value) {
            $builder->whereHas('child.user', function ($query) use ($value) {
                $query->where('first_name', 'like', "%{$value}%");
            });
        });
        $builder->when($filters['level'] ?? false, function ($builder, $value) {
          
                $builder->where('level', '=', $value);
          
        });
    }
    public function scopeFilterAdvertisements(Builder $builder, $filters)
    {
        $builder->when($filters['status'] ?? false, function ($builder, $value) {
                $builder->where('status', '=', $value);
            
        });
    }
}
