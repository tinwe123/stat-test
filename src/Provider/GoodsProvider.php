<?php

declare(strict_types=1);

namespace App\Provider;

use App\Goods\AgedBrie;
use App\Goods\BackstagePasses;
use App\Goods\Common;
use App\Goods\GoodInterface;
use App\Goods\Sulfuras;
use App\Item;
use Generator;

final class GoodsProvider implements GoodsProviderInterface
{
    public function getByItem(Item $item): GoodInterface
    {
        foreach ($this->getGoods() as $good) {
            if ($good->isSupported($item)) {
                return $good;
            }
        }

        return new Common();
    }

    private function getGoods(): Generator
    {
        yield new AgedBrie();
        yield new Sulfuras();
        yield new BackstagePasses();
    }
}
