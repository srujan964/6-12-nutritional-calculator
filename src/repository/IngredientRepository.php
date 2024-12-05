<?php
declare(strict_types=1);

namespace App\Repository;

use App\Model\Ingredient;
use App\Model\IngredientCollection;

interface IngredientRepository
{
    public function findAll(): IngredientCollection;
}
