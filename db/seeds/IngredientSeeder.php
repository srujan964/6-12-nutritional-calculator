<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class IngredientSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Baguette',
                'description' => 'Contains Wheat, Yeast, Sesame.'
            ],
            [
                'name' => 'Sliced Ham',
                'description' => ''
            ],
            [
                'name' => 'Salami',
                'description' => ''
            ],
            [
                'name' => 'Mortadella',
                'description' => ''
            ],
            [
                'name' => 'Sliced Tomatoes',
                'description' => ''
            ],
            [
                'name' => 'Provolone Cheese',
                'description' => ''
            ],
            [
                'name' => 'Iceberg Lettuce',
                'description' => ''
            ],
            [
                'name' => 'Salt and Pepper',
                'description' => ''
            ],
            [
                'name' => 'French Fries',
                'description' => ''
            ],
            [
                'name' => 'Sprite',
                'description' => ''
            ],
            [
                'name' => 'Coke',
                'description' => ''
            ],
            [
                'name' => 'Ice Cubes',
                'description' => ''
            ]
        ];

        $ingredients = $this->table('ingredient');
        $ingredients->insert($data)
            ->save();
    }
}
