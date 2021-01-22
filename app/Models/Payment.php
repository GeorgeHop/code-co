<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 * @package App\Models
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'offer_id', 'paid', 'refunded'];

    public function offer() {
        return $this->belongsTo(CoursesOffer::class, 'offer_id');
    }

    public function merchantSignature(): string {
        $data = implode(';', [
            env('WFP_MERCHANT_ACCOUNT'),
            request()->getHost(),
            $this->id,
            $this->created_at->unix(),
            $this->offer->cost,
            $this->offer->currency,
            $this->offer->course->name . ' - ' . $this->offer->title,
            1,
            $this->offer->cost,
        ]);

        return hash_hmac('md5', $data, env('WFP_SECRET_KEY'));
    }
}
