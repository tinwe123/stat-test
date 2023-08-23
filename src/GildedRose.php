<?php

declare(strict_types=1);

namespace App;

use App\Provider\GoodsProviderInterface;

final class GildedRose
{
    public function __construct(
        private readonly GoodsProviderInterface $goodsProvider
    ) {
    }

    public function updateQuality($item): void
    {
        $this->goodsProvider->getByItem($item)->endDay($item);
    }
}