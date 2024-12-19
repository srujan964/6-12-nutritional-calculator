<?php

declare(strict_types=1);

namespace App\Repository;

interface NutritionalInfoRepository
{
    public function findByIngredientIds(array $ingredientIts);
}