<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursesOffer;
use App\Models\Payment;
use App\Models\User;
use App\Notifications\PaidNotification;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function generate() {
        $offer = CoursesOffer::findOrFail(request()->offerId);
        $payment = Payment::create([
            'user_id' => auth()->id(),
            'offer_id' => $offer->id,
        ]);

        return response()->json([
            'merchantSecretKey' => env('WFP_SECRET_KEY'),
            'merchantAccount' => env('WFP_MERCHANT_ACCOUNT'),
            'merchantDomainName' => request()->getHost(),
            'merchantSignature' => $payment->merchantSignature(),
            'orderReference' => $payment->uuid,
            'orderDate' => $payment->created_at->unix(),
            'orderTimeout' => 49000,
            'amount' => $offer->cost,
            'currency' => $offer->currency,
            'language' => 'auto',
            'productName' => [$offer->course->name . ' - ' . $offer->title],
            'productPrice' => [$offer->cost],
            'productCount' => [1],
        ]);
    }

    public function approve(Request $request) {
        if (!$request->merchantSignature || !$request->orderReference)
            abort(404);

        $payment = Payment::where('uuid', $request->orderReference)->first();
        $paidOffer = $payment->offer;
        $user = User::where('id', $payment->user_id)->first();

        $payment->paid = true;
        $payment->save();
        $user->courses()->attach($payment->offer_id, [
            'offer_type' => $paidOffer->type,
            'course_id' => $payment->offer->course_id,
            'user_id' => $payment->user_id
        ]);

        $userCourse = Course::where('id', $payment->offer->course_id)->first();
        $notifyData = [
          'course' => $userCourse,
          'offer' => $payment->offer
        ];

        $user->notify(new PaidNotification($notifyData));

        return response()->json();
    }
}
