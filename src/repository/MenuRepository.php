<?php
declare(strict_types=1);

namespace App\Repository;

use App\Model\MenuItemCollection;

interface MenuRepository
{
    public function findAll(): MenuItemCollection;
}