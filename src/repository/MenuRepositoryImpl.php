<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Ingredient;
use App\Model\IngredientCollection;
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
            ->query("SELECT `item_id`, `name`, `category`, `description`, `image_url` FROM `menu_item`")
            ->fetchAll();
        $menu_items = new MenuItemCollection();
        foreach ($results as $result) {
            $menu_items->add($this->mapToMenuItem($result));
        }

        return $menu_items;
    }

    public function findByCategory(string $category): MenuItemCollection
    {
        $select = $this->db
            ->prepare("SELECT `item_id`, `name`, `category`, `description`, `image_url` FROM `menu_item` WHERE `category` = :category");
        $select->execute(['category' => $category]);
        $menu_items = new MenuItemCollection();
        $results = $select->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $menu_items->add($this->mapToMenuItem($result));
        }

        return $menu_items;
    }

    public function findByIdWithIngredients(int $id): MenuItem
    {
        $sql = <<<SQL
            SELECT `menu_item`.`item_id`, 
            `menu_item`.`name`, 
            `menu_item`.`category`, 
            `menu_item`.`description`, 
            `menu_item`.`image_url`,
            `ingredient`.`ingredient_id`, 
            `ingredient`.`name` AS `ingredient_name`, 
            `ingredient`.`description`AS `ingredient_description`
            FROM `menu_item`
            INNER JOIN `ingredient`
            INNER JOIN `menu_item_consists_of`
            ON `menu_item`.`item_id` = `menu_item_consists_of`.`item_id`
            AND `ingredient`.`ingredient_id` = `menu_item_consists_of`.`ingredient_id`
            WHERE `menu_item`.`item_id` = :item_id;
        SQL;


        $select = $this->db->prepare($sql);
        $select->execute(['item_id' => $id]);
        $results = $select->fetchAll(PDO::FETCH_ASSOC);

        return $this->mapToMenuItemWithIngredients($results);
    }

    private function mapToMenuItemWithIngredients($rows)
    {
        $first_row = $rows[0];
        $menu_item_id =  $first_row['item_id'];
        $menu_item_name = $first_row['name'];
        $menu_item_category = $first_row['category'];
        $menu_item_description = $first_row['description'];
        $menu_item_image_url = $first_row['image_url'];
        $ingredients = new IngredientCollection();

        foreach ($rows as $row) {
            $ingredient = new Ingredient(
                $row['ingredient_id'],
                $row['ingredient_name'],
                $row['ingredient_description']
            );
            $ingredients->add($ingredient);
        }

        if (count($rows) == 0) {
            return new MenuItem(
                $menu_item_id,
                $menu_item_name,
                $menu_item_category,
                $menu_item_description,
                $menu_item_image_url
            );
        }

        return MenuItem::fromBasicDataAndIngredients(
            $menu_item_id,
            $menu_item_name,
            $menu_item_category,
            $menu_item_description,
            $menu_item_image_url,
            $ingredients
        );
    }

    private function mapToMenuItem($row)
    {
        return new MenuItem(
            $row['item_id'],
            $row['name'],
            $row['category'],
            $row['description'],
            $row['image_url']
        );
    }
}
