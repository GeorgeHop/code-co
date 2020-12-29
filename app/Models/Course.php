<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 * @package App\Models
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Course extends Model
{
    use HasFactory;


    public function videos()
    {
        return $this->hasMany(CoursesVideo::class);
    }

    public function materials()
    {
        return $this->hasMany(CoursesMaterial::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
