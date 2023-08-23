<?php

declare(strict_types=1);

namespace App\Goods;

use App\Item;

final class AgedBrie implements GoodInterface
{
    public function endDay(Item $item): void
    {
        $item->sell_in--;

        if ($item->isMaximumQualityReached(50)) {
            return;
        }

        $item->quality++;
        if ($item->isMaximumQualityReached(50)) {
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
}
