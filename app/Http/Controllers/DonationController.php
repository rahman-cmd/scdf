<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'amount' => ['required', 'numeric', 'min:1', 'max:1000000'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->to(route('home').'#donate')
                ->withErrors($validator)
                ->withInput();
        }

        $amount = (float) $validator->validated()['amount'];
        $formatted = fmod($amount, 1.0) === 0.0
            ? number_format($amount, 0)
            : number_format($amount, 2);

        return redirect()
            ->to(route('home').'#donate')
            ->with('status', 'Thank you, '.$validator->validated()['name'].'. This demo recorded a $'.$formatted.' gift and is ready to connect with SSLCommerz, Stripe, or PayPal.');
    }
}
