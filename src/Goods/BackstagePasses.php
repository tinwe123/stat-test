<?php

declare(strict_types=1);

namespace App\Goods;

use App\Item;

final class BackstagePasses extends AbstractGood implements GoodInterface
{
    public function endDay(Item $item): void
    {
        $item->sell_in--;

        if ($item->isSellDateHasPassed()) {
            $item->quality = 0;
            return;
        }

        if ($this->isMaximumQualityReached($item)) {
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

        if ($this->isMaximumQualityPassed($item)) {
            $this->setMaximumQuality($item);
        }
    }

    public function isSupported(Item $item): bool
    {
        return $item->name === 'Backstage passes to a TAFKAL80ETC concert';
    }

    protected function getMaximumQuality(): int
    {
        return 50;
    }
}

