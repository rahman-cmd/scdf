<?php

namespace App\Models;

use App\Enums\DonationPaymentMethod;
use App\Support\Media;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $guarded = [];

    public static function current(): self
    {
        return static::query()->firstOrCreate([]);
    }

    public function logoUrl(): string
    {
        return Media::url($this->logo) ?: asset('images/scdf.png');
    }

    public function footerLogoUrl(): string
    {
        return Media::url($this->footer_logo) ?: asset('images/logo_w.png');
    }

    public function paymentAccount(?DonationPaymentMethod $method): ?string
    {
        if ($method === null) {
            return null;
        }

        return match ($method) {
            DonationPaymentMethod::Bkash => $this->payment_bkash,
            DonationPaymentMethod::Nagad => $this->payment_nagad,
            DonationPaymentMethod::Rocket => $this->payment_rocket,
            DonationPaymentMethod::Upay => $this->payment_upay,
        };
    }
}
