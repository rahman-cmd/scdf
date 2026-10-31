<?php

namespace App\Models;

use App\Enums\DonationPaymentMethod;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'payment_method' => DonationPaymentMethod::class,
        ];
    }
}
