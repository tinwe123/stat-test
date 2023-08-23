<?php

declare(strict_types=1);

namespace App\Goods;

use App\Item;

final class BackstagePasses implements GoodInterface
{
    public function endDay(Item $item): void
    {
        $item->sell_in--;

        if ($item->isSellDateHasPassed()) {
            $item->quality = 0;
            return;
        }

        if ($item->isMaximumQualityReached(50)) {
            return;
        }

        $daysLeft = $item->howManyDaysLeft();
        if ($daysLeft >= 10) {
            $item->quality++;
        } elseif ($daysLeft > 5) {
            $item->quality += 2;
        } else {
            $item->quality += 3;
        }

        if ($item->isMaximumQualityReached(50)) {
            $item->quality = 50;
        }
    }

    public function isSupported(Item $item): bool
    {
        return $item->name === 'Backstage passes to a TAFKAL80ETC concert';
    }
}

