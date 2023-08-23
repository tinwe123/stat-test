<?php

declare(strict_types=1);

namespace App\Goods;

use App\Item;

abstract class AbstractGood implements GoodInterface
{
    abstract protected function getMaximumQuality(): int;

    public function isMaximumQualityPassed(Item $item): bool
    {
        return $item->quality > $this->getMaximumQuality();
    }

    public function isMaximumQualityReached(Item $item): bool
    {
        return $item->quality === $this->getMaximumQuality();
    }

    public function setMaximumQuality(Item $item): void
    {
        $item->quality = $this->getMaximumQuality();
    }
}
