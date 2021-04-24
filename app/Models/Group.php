<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_launch',
        'launch_date'
    ];

    public function videos()
    {
        return $this->belongsToMany(CoursesVideo::class)->withPivot('is_open');
    }

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
