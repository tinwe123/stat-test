<?php

declare(strict_types=1);

namespace App\Goods;

use App\Item;

final class Common extends AbstractGood implements GoodInterface
{
    public function endDay(Item $item): void
    {
        $item->decreaseSellIn(1);

        if ($this->isMaximumQualityReached($item)) {
            return;
        }

        if (!$item->isSellDateHasPassed()) {
            $item->decreaseQuality(1);
            return;
        }

        $item->decreaseQuality(2);
        if ($item->quality < 0) {
            $item->quality = 0;
        }
    }

    public function isSupported(Item $item): bool
    {
        return true;
    }

    protected function getMaximumQuality(): int
    {
        return 50;
    }
}
