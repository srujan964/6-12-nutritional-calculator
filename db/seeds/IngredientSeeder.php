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
                'name' => 'English Muffin',
                'category' => 'Breakfast',
                'description' => 'Contains Wheat, Sesame.'
            ],
            [
                'name' => 'Egg',
                'category' => 'Breakfast',
                'description' => 'USDA Grade A Eggs.'
            ],
            [
                'name' => 'Salted Butter',
                'category' => 'Breakfast',
                'description' => 'Contains Dairy.'
            ]
        ];

        $ingredients = $this->table('ingredient');
        $ingredients->insert($data)
            ->save();
    }
}
