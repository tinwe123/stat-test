<?php

declare(strict_types=1);

namespace App\Goods;

use App\Item;

interface GoodInterface
{
    public function endDay(Item $item): void;

    public function isSupported(Item $item): bool;
}
