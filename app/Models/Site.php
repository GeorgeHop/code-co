<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'mail_box',
        'telegram',
        'telegram_description',
        'instagram',
        'instagram_description',
    ];
}
