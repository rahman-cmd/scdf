<?php

namespace App\Http\Controllers;

use App\Enums\DonationPaymentMethod;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'amount' => ['required', 'numeric', 'min:1', 'max:1000000'],
            'payment_method' => ['required', Rule::enum(DonationPaymentMethod::class)],
            'transaction_id' => ['required', 'string', 'max:80'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->to(route('home').'#donate')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();
        $amount = (float) $data['amount'];
        $method = DonationPaymentMethod::from($data['payment_method']);

        Donation::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'amount' => $amount,
            'payment_method' => $method->value,
            'transaction_id' => $data['transaction_id'],
            'currency' => 'BDT',
            'status' => 'new',
        ]);

        $formatted = fmod($amount, 1.0) === 0.0
            ? number_format($amount, 0)
            : number_format($amount, 2);

        return redirect()
            ->to(route('home').'#donate')
            ->with('status', 'Thank you, '.$data['name'].'. We recorded your ৳'.$formatted.' '.$method->label().' donation (TrxID: '.$data['transaction_id'].'). Our team will confirm it shortly.');
    }
}
