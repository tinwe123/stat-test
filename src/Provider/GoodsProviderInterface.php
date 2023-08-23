<?php

declare(strict_types=1);

namespace App\Provider;

use App\Goods\GoodInterface;
use App\Item;

interface GoodsProviderInterface
{
    public function getByItem(Item $item): GoodInterface;
}
