<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CoursesMaterial
 * @package App\Models
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CoursesMaterial extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
