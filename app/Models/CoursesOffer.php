<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CoursesOffer
 * @package App\Models
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CoursesOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'currency',
        'cost',
        'type',
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
