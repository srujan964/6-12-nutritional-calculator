<?php

declare(strict_types=1);

namespace App\Model;

use JsonSerializable;

class Ingredient implements JsonSerializable
{
    private int $ingredient_id;
    private string $name;
    private string $description;
    private bool $is_default;

    public function __construct(int $id, string $name, string $description)
    {
        $this->ingredient_id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->is_default = false;
    }

    public static function withIsDefault(
        int $id,
        string $name,
        string $description,
        bool $is_default
    ) {
        $new = new static($id, $name, $description);
        $new->is_default = $is_default;
        return $new;
    }

    public function name(): string
    {
        return $this->name;
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
            'description' => $this->description,
            'is_default' => $this->is_default
        ];
    }
}
