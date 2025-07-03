<?php

namespace App;

enum Currency :string
{
    case RUB = 'RUB';
    case USD = 'USD';
    case EUR = 'EUR';

    /**
     * @return string
     */
    public function symbol(): string
    {
        return match ($this) {
            self::RUB => '₽',
            self::USD => '$',
            self::EUR => '€',
        };
    }

    /**
     * @return float
     */
    public function rate(): float
    {
        return match ($this) {
            self::RUB => 1,
            self::USD => 90,
            self::EUR => 100,
        };
    }

    /**
     * @param string $value
     * @return self
     */
    public static function fromString(string $value): self
    {
        return match (strtoupper($value)) {
            'USD' => self::USD,
            'EUR' => self::EUR,
            default => self::RUB,
        };
    }
}
