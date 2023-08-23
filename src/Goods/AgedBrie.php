<?php

declare(strict_types=1);

namespace App\Goods;

use App\Item;

final class AgedBrie extends AbstractGood implements GoodInterface
{
    public function endDay(Item $item): void
    {
        $item->sell_in--;

        if ($this->isMaximumQualityReached($item)) {
            return;
        }

        $item->quality++;
        if ($this->isMaximumQualityReached($item)) {
            return;
        }

        if ($item->isSellDateHasPassed()) {
            $item->quality++;
        }
    }

    public function isSupported(Item $item): bool
    {
        return $item->name === 'Aged Brie';
    }

    protected function getMaximumQuality(): int
    {
        return 50;
    }
}
