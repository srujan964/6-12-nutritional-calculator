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
                'name' => 'Italian Club Sandwich',
                'category' => 'hoagies',
                'description' => '',
                'image_url' => '/static/assets/hoagie.png'
            ],
            [
                'name' => 'Philly Cheesesteak',
                'category' => 'hoagies',
                'description' => '',
                'image_url' => '/static/assets/cheesesteak.jpeg'
            ],
            [
                'name' => 'Veggie Sub',
                'category' => 'hoagies',
                'description' => '',
                'image_url' => '/static/assets/hoagie6.webp'
            ],
            [
                'name' => 'Meatball Sub',
                'category' => 'hoagies',
                'description' => '',
                'image_url' => '/static/assets/meatball-sub-small.jpg'
            ],
            [
                'name' => 'Diet Coke',
                'category' => 'beverages',
                'description' => '',
                'image_url' => '/static/assets/cola.jpeg'
            ],
            [
                'name' => 'Sprite',
                'category' => 'beverages',
                'description' => '',
                'image_url' => '/static/assets/sprite.jpg'
            ],
            [
                'name' => 'Fries',
                'category' => 'sides',
                'description' => '',
                'image_url' => '/static/assets/sides.jpg'
            ],
        ];

        $menu_item = $this->table('menu_item');

        $menu_item->insert($data)
            ->save();
    }
}
