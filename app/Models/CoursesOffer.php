<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }
}
