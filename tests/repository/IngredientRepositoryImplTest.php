<?php

declare(strict_types=1);

namespace Tests\Repositosy;

use App\Model\Ingredient;
use App\Model\IngredientCollection;
use PHPUnit\Framework\TestCase;
use Mockery;

use PDO;
use PDOStatement;
use App\Repository\IngredientRepositoryImpl;
use PHPUnit\Framework\Attributes\Test;

class IngredientRepositoryImplTest extends TestCase
{

    #[Test]
    public function findAllShouldRunQueryToSelectAllIngredients(): void
    {
        $mockDB = Mockery::mock(PDO::class);

        $mockPDOStatement = Mockery::mock(PDOStatement::class);

        $mockDB->shouldReceive('query')
            ->with("SELECT `ingredient_id`, `name`, `category`, `description` FROM `ingredient`")
            ->andReturn($mockPDOStatement);

        $dbRow = [
            [
                'ingredient_id' => 1,
                'name' => 'English Muffin',
                'category' => 'Breakfast',
                'description' => 'Contains yeast, gluten.'
            ]
        ];

        $expectedIngredient = new Ingredient(1, 'English Muffin', 'Breakfast', 'Contains yeast, gluten.');
        $expected = new IngredientCollection(array($expectedIngredient));


        $mockPDOStatement->shouldReceive('fetchAll')
            ->andReturn($dbRow);

        $subject = new IngredientRepositoryImpl($mockDB);

        $actual = $subject->findAll();

        $this->assertEquals($expected, $actual);
    }


    protected function tearDown(): void
    {
        Mockery::close();
    }
}
