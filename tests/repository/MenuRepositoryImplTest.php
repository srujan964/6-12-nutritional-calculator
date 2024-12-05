<?php

declare(strict_types=1);

namespace Tests\Repository;

use PDO;
use PDOStatement;

use App\Model\MenuItem;
use App\Model\MenuItemCollection;
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

    protected function tearDown(): void
    {
        Mockery::close();
    }
}
