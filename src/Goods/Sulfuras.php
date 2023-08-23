<?php

declare(strict_types=1);

namespace App\Goods;

use App\Item;

final class Sulfuras implements GoodInterface
{
    public function endDay(Item $item): void
    {

    }

    public function isSupported(Item $item): bool
    {
        return $item->name === 'Sulfuras, Hand of Ragnaros';
    }
}
