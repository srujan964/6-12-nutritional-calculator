<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Ingredient;
use App\Model\IngredientCollection;
use PDO;

class IngredientRepositoryImpl implements IngredientRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll(): IngredientCollection
    {
        $results = $this->db->query("SELECT `ingredient_id`, `name`, `category`, `description` FROM `ingredient`")
            ->fetchAll();
        $ingredients = new IngredientCollection();
        foreach ($results as $result) {
            $ingredient = $this->mapToIngredient($result);
            $ingredients->add($ingredient);
        }
        return $ingredients;
    }


    private function mapToIngredient($row): Ingredient
    {
        return new Ingredient(
            $row['ingredient_id'],
            $row['name'],
            $row['category'],
            $row['description'],
        );
    }
}
