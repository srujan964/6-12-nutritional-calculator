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
    private string $image_url;
    private IngredientCollection $ingredients;

    public function __construct(int $item_id, string $name, string $category, string $description, string $image_url)
    {
        $this->item_id = $item_id;
        $this->name = $name;
        $this->category = $category;
        $this->description = $description;
        $this->image_url = $image_url;
        $this->ingredients = new IngredientCollection();
    }

    public static function fromBasicDataAndIngredients(
        int $item_id,
        string $name,
        string $category,
        string $description,
        string $image_url,
        IngredientCollection $ingredients
    ): MenuItem {
        $new = new static($item_id, $name, $category, $description, $image_url);
        $new->ingredients = $ingredients;
        return $new;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'item_id' => $this->item_id,
            'name' => $this->name,
            'category' => $this->category,
            'description' => $this->description,
            'image_url' => $this->image_url,
            'ingredients' => $this->ingredients
        ];
    }
}
