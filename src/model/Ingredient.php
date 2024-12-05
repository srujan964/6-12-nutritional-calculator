<?php

declare(strict_types=1);

namespace App\Model;

use JsonSerializable;

class Ingredient implements JsonSerializable
{
    private int $ingredient_id;
    private string $name;
    private string $category;
    private string $description;

    public function __construct(int $id, string $name, string $category, string $description)
    {
        $this->ingredient_id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->description = $description;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function category(): string
    {
        return $this->category;
    }

    public function describe(): string
    {
        return $this->description;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'ingredient_id' => $this->ingredient_id,
            'name' => $this->name,
            'category' => $this->category,
            'description' => $this->description,
        ];
    }
}
