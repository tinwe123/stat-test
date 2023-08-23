<?php

declare(strict_types=1);

namespace App\Goods;

use App\Item;

final class Common implements GoodInterface
{
    public function endDay(Item $item): void
    {
        $item->sell_in--;

        if ($item->isMaximumQualityReached(50)) {
            return;
        }

        if (!$item->isSellDateHasPassed()) {
            $item->quality++;
        }

        $item->quality -= 2;
        if ($item->quality < 0) {
            $item->quality = 0;
        }
    }

    public function isSupported(Item $item): bool
    {
        return true;
    }
}
