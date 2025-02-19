<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CoursesVideo
 * @package App\Models
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CoursesVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'source',
        'course_id',
        'video_number'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function materials()
    {
        return $this->hasMany(CoursesMaterial::class, 'video_id');
    }
}
