<?php

namespace App\Enums;

enum DonationPaymentMethod: string
{
    case Bkash = 'bkash';
    case Nagad = 'nagad';
    case Rocket = 'rocket';
    case Upay = 'upay';

    public function label(): string
    {
        return match ($this) {
            self::Bkash => 'bKash',
            self::Nagad => 'Nagad',
            self::Rocket => 'Rocket',
            self::Upay => 'Upay',
        };
    }

    public static function labelFor(null|self|string $value): string
    {
        if ($value instanceof self) {
            return $value->label();
        }

        return self::tryFrom((string) $value)?->label() ?? '—';
    }

    /**
     * @return array<string, string>
     */
    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $method): array => [$method->value => $method->label()])
            ->all();
    }
}
