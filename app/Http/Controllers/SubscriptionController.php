<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Exception;

class SubscriptionController extends Controller
{
    public function orderPost(Request $request)
    {
        $user = auth()->user();
        $input = $request->all();
        $token = $request->stripeToken;
        $paymentMethod = $request->paymentMethod;
        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            if (is_null($user->stripe_id)) {
                $stripeCustomer = $user->createAsStripeCustomer();
            }

            Stripe\Customer::createSource(
                $user->stripe_id,
                ['source' => $token]
            );

            $user->newSubscription('test', $input['plane'])->create($paymentMethod, [
                'email' => $user->email,
            ]);

            return back()->with('success', 'Поздравляем ! Вы преобрели курс.');
        } catch (Exception $e) {
            return back()->with('success', 'Какие-то проблемы... Попробуйте еще раз :)');
        }
    }
}
