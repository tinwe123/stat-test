<?php

declare(strict_types=1);

namespace App;

final class Item
{
    function __construct(
        public string $name,
        public int $sell_in,
        public int $quality
    ) {
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    public function howManyDaysLeft(): int
    {
        return $this->sell_in <= 0 ? 0 : abs(0 - $this->sell_in);
    }

    public function isSellDateHasPassed(): bool
    {
        return $this->sell_in < 0;
    }

    public function increaseQuality(int $value): void
    {
        $this->quality += $value;
    }

    public function decreaseQuality(int $value): void
    {
        $this->quality -= $value;
    }

    public function decreaseSellIn(int $value): void
    {
        $this->sell_in -= $value;
    }
}