<?php

declare(strict_types=1);

namespace App\Repository;

use PDO;

use App\Repository\MenuRepository;
use App\Model\MenuItem;
use App\Model\MenuItemCollection;

class MenuRepositoryImpl implements MenuRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll(): MenuItemCollection
    {
        $results = $this->db
            ->query("SELECT `item_id`, `name`, `category`, `description` FROM `menu_item`")
            ->fetchAll();

        $menu_items = new MenuItemCollection();

        foreach ($results as $result) {
            $menu_items->add($this->mapToMenuItem($result));
        }

        return $menu_items;
    }

    private function mapToMenuItem($row)
    {
        return new MenuItem(
            $row['item_id'],
            $row['name'],
            $row['category'],
            $row['description']
        );
    }
}
