<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class MenuItemSeeder extends AbstractSeed
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
                'name' => 'Classic Club Sandwich',
                'category' => 'lunch',
                'description' => '',
            ],
            [
                'name' => 'Philly Cheesesteak',
                'category' => 'lunch',
                'description' => ''
            ],
            [
                'name' => 'Veggie Sub',
                'category' => 'lunch',
                'description' => '',
            ],
            [
                'name' => 'Breakfast Sandwich',
                'category' => 'breakfast',
                'description' => ''
            ],
            [
                'name' => 'Meatball Sub',
                'category' => 'dinner',
                'description' => ''
            ],
            [
                'name' => 'Diet Coke',
                'category' => 'beverages',
                'description' => ''
            ],
            [
                'name' => 'Iced Tea',
                'category' => 'beverages',
                'description' => ''
            ]
        ];

        $menu_item = $this->table('menu_item');

        $menu_item->insert($data)
            ->save();
    }
}
