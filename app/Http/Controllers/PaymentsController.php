<?php

namespace App\Http\Controllers;

use App\Models\CoursesOffer;
use App\Models\Payment;
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
            'orderReference' => $payment->id,
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

        $payment = Payment::find($request->orderReference);
        $payment->paid = true;
        $payment->save();
        return response()->json();
    }
}
