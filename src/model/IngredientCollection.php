<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Ingredient;
use JsonSerializable;

class IngredientCollection implements JsonSerializable
{
    private array $items;

    public function __construct(array $items = [])
    {
        foreach ($items as $item) {
            $this->add($item);
        }
    }

    public function add(Ingredient $ingredient)
    {
        $this->items[] = $ingredient;
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
