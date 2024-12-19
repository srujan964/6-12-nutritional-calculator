<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class MenuItemContainsSeeder extends AbstractSeed
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
                'item_id' => 1,
                'ingredient_id' => 1
            ],
            [
                'item_id' => 1,
                'ingredient_id' => 2
            ],
            [
                'item_id' => 1,
                'ingredient_id' => 3
            ],
            [
                'item_id' => 1,
                'ingredient_id' => 4
            ],
            [
                'item_id' => 1,
                'ingredient_id' => 5
            ],
            [
                'item_id' => 1,
                'ingredient_id' => 6
            ],
            [
                'item_id' => 1,
                'ingredient_id' => 7
            ],
            [
                'item_id' => 1,
                'ingredient_id' => 8
            ],
            [
                'item_id' => 5,
                'ingredient_id' => 11
            ],
            [
                'item_id' => 6,
                'ingredient_id' => 10
            ],
            [
                'item_id' => 5,
                'ingredient_id' => 12
            ],
            [
                'item_id' => 6,
                'ingredient_id' => 12
            ],
            [
                'item_id' => 7,
                'ingredient_id' => 8
            ],
            [
                'item_id' => 7,
                'ingredient_id' => 9
            ]
        ];

        $table = $this->table('menu_item_consists_of');
        $table->insert($data)
            ->save();
    }
}
