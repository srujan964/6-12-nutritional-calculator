<?php

declare(strict_types=1);

namespace Tests\Repository;

use App\Model\IngredientCollection;
use PDO;
use PDOStatement;

use App\Model\MenuItem;
use App\Model\MenuItemCollection;
use App\Model\Ingredient;
use App\Repository\MenuRepositoryImpl;

use PHPUnit\Framework\TestCase;
use Mockery;
use PHPUnit\Framework\Attributes\Test;

class MenuRepositoryImplTest extends TestCase
{
    #[Test]
    public function findAllShouldRunQueryToSelectAllMenuItems()
    {
        $mockDB = Mockery::mock(PDO::class);

        $mockPDOStatement = Mockery::mock(PDOStatement::class);

        $mockDB->shouldReceive('query')
            ->with("SELECT `item_id`, `name`, `category`, `description` FROM `menu_item`")
            ->andReturn($mockPDOStatement);

        $dbRow = [
            [
                'item_id' => 1,
                'name' => 'Philly Cheesesteak',
                'category' => 'lunch',
                'description' => ''
            ],
            [
                'item_id' => 2,
                'name' => 'Diet Coke',
                'category' => 'beverages',
                'description' => ''
            ]
        ];

        $itemOne = new MenuItem(1, 'Philly Cheesesteak', 'lunch', '');
        $itemTwo = new MenuItem(2, 'Diet Coke', 'beverages', '');
        $expected = new MenuItemCollection(array($itemOne, $itemTwo));

        $mockPDOStatement->shouldReceive('fetchAll')
            ->andReturn($dbRow);

        $subject = new MenuRepositoryImpl($mockDB);

        $actual = $subject->findAll();

        $this->assertEquals($expected, $actual);
    }

    #[Test]
    public function findByCategoryShouldFindItemsFilteredByCategory()
    {
        $mockDB = Mockery::mock(PDO::class);

        $mockPDOStatement = Mockery::mock(PDOStatement::class);

        $mockDB->shouldReceive('prepare')
            ->with("SELECT `item_id`, `name`, `category`, `description` FROM `menu_item` WHERE `category` = :category")
            ->andReturn($mockPDOStatement);

        $dbRow = [
            [
                'item_id' => 1,
                'name' => 'Philly Cheesesteak',
                'category' => 'lunch',
                'description' => ''
            ],
            [
                'item_id' => 2,
                'name' => 'Diet Coke',
                'category' => 'beverages',
                'description' => ''
            ]
        ];

        $itemOne = new MenuItem(1, 'Philly Cheesesteak', 'lunch', '');
        $itemTwo = new MenuItem(2, 'Diet Coke', 'beverages', '');
        $expected = new MenuItemCollection(array($itemOne, $itemTwo));

        $category = 'lunch';

        $mockPDOStatement->shouldReceive('execute')
            ->with(['category' => $category]);
        $mockPDOStatement->shouldReceive('fetchAll')
            ->andReturn($dbRow);

        $subject = new MenuRepositoryImpl($mockDB);

        $actual = $subject->findByCategory($category);

        $this->assertEquals($expected, $actual);
    }

    #[Test]
    public function findByIdWithIngredientsShouldFindMenuItemJoinedWithAssociatedIngredients()
    {
        $mockDB = Mockery::mock(PDO::class);
        $id = '1';

        $mockPDOStatement = Mockery::mock(PDOStatement::class);

        $expectedSQL = <<<SQL
            SELECT `menu_item`.`item_id`, 
            `menu_item`.`name`, 
            `menu_item`.`category`, 
            `menu_item`.`description`, 
            `ingredient`.`ingredient_id`, 
            `ingredient`.`name` AS `ingredient_name`, 
            `ingredient`.`category` AS `ingredient_category`, 
            `ingredient`.`description`AS `ingredient_description`
            FROM `menu_item`
            INNER JOIN `ingredient`
            INNER JOIN `menu_item_consists_of`
            ON `menu_item`.`item_id` = `menu_item_consists_of`.`item_id`
            AND `ingredient`.`ingredient_id` = `menu_item_consists_of`.`ingredient_id`
            WHERE `menu_item`.`item_id` = :item_id;
        SQL;

        $mockDB->shouldReceive('prepare')
            ->with($expectedSQL)
            ->andReturn($mockPDOStatement);

        $dbRow = [
            [
                'item_id' => 1,
                'name' => 'Philly Cheesesteak',
                'category' => 'lunch',
                'description' => '',
                'ingredient_id' => 1,
                'ingredient_name' => 'Bread Roll',
                'ingredient_category' => '',
                'ingredient_description' => ''
            ],
            [
                'item_id' => 1,
                'name' => 'Philly Cheesesteak',
                'category' => 'lunch',
                'description' => '',
                'ingredient_id' => 2,
                'ingredient_name' => 'Ribeye Steak',
                'ingredient_category' => '',
                'ingredient_description' => ''
            ],
            [
                'item_id' => 1,
                'name' => 'Philly Cheesesteak',
                'category' => 'lunch',
                'description' => '',
                'ingredient_id' => 3,
                'ingredient_name' => 'Cheez Whiz',
                'ingredient_category' => '',
                'ingredient_description' => ''
            ]
        ];
        $ingredients = [
            new Ingredient(1, 'Bread Roll', '', ''),
            new Ingredient(2, 'Ribeye Steak', '', ''),
            new Ingredient(3, 'Cheez Whiz', '', '')
        ];

        $expected = MenuItem::fromBasicDataAndIngredients(
            1,
            'Philly Cheesesteak',
            'lunch',
            '',
            new IngredientCollection($ingredients)
        );

        $mockPDOStatement->shouldReceive('execute')
            ->with(['item_id' => $id]);

        $mockPDOStatement->shouldReceive('fetchAll')
            ->with(PDO::FETCH_ASSOC)
            ->andReturn($dbRow);

        $subject = new MenuRepositoryImpl($mockDB);

        $actual = $subject->findByIdWithIngredients(1);

        $this->assertEquals($expected, $actual);
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }
}
