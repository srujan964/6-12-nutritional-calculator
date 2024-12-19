<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\MenuItemCollection;
use App\Model\MenuItem;

interface MenuRepository
{
    public function findAll(): MenuItemCollection;

    public function findByCategory(string $category): MenuItemCollection;

    public function findByIdWithIngredients(int $id): MenuItem;
}
