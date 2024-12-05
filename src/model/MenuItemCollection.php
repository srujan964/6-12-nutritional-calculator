<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\MenuItem;
use JsonSerializable;

class MenuItemCollection implements JsonSerializable
{
    private array $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function add(MenuItem $item): void
    {
        $this->items[] = $item;
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function jsonSerialize(): mixed
    {
        return $this->items;
    }
}
