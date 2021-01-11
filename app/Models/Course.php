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

    protected $fillable = [
        'name',
        'cost',
        'duration',
        'info',
        'author_id',
        'is_on_homepage'
    ];

    public function videos()
    {
        return $this->hasMany(CoursesVideo::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
