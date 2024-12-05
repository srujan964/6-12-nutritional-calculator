<?php

declare(strict_types=1);

namespace App\Model;

use JsonSerializable;

class MenuItem implements JsonSerializable
{
    private int $item_id;
    private string $name;
    private string $category;
    private string $description;

    public function __construct(int $item_id, string $name, string $category, string $description)
    {
        $this->item_id = $item_id;
        $this->name = $name;
        $this->category = $category;
        $this->description = $description;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'item_id' => $this->item_id,
            'name' => $this->name,
            'category' => $this->category,
            'description' => $this->description,
        ];
    }
}
