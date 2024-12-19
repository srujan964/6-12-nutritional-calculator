<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class InsertData extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $data_1 = [
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
        $ingredients->insert($data_1)
            ->save();

        $data_2 = [
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

        $menu_item->insert($data_2)
            ->save();

        $data_3 = [
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
        $table->insert($data_3)
            ->save();

$data_4 = [
            [
                'ingredient_id' => 1,
                'calories' => 440,
                'carbohydrates' => 84,
                'protein' => 18,
                'sodium' => 970,
                'fats' => 4,
                'saturated_fats' => 2,
                'trans_fats' => 0,
                'sugars' => 8,
                'added_sugars' => 3,
                'cholesterol' => 0,
                'vitamin_d' => 0,
                'calcium' => 84,
                'potassium' => 190,
                'iron' => 7
            ],
            [
                'ingredient_id' => 2,
                'calories' => 48,
                'carbohydrates' => 1,
                'protein' => 7,
                'sodium' => 327,
                'fats' => 1,
                'saturated_fats' => 1,
                'trans_fats' => 0,
                'sugars' => 1,
                'added_sugars' => 0,
                'cholesterol' => 22,
                'vitamin_d' => 1,
                'calcium' => 1,
                'potassium' => 115,
                'iron' => 0
            ],
            [
                'ingredient_id' => 3,
                'calories' => 126,
                'carbohydrates' => 0,
                'protein' => 6,
                'sodium' => 529,
                'fats' => 10,
                'saturated_fats' => 4,
                'trans_fats' => 6,
                'sugars' => 1,
                'added_sugars' => 0,
                'cholesterol' => 22,
                'vitamin_d' => 0,
                'calcium' => 3,
                'potassium' => 95,
                'iron' => 1
            ],
            [
                'ingredient_id' => 4,
                'calories' => 88,
                'carbohydrates' => 1,
                'protein' => 5,
                'sodium' => 353,
                'fats' => 7,
                'saturated_fats' => 3,
                'trans_fats' => 4,
                'sugars' => 0,
                'added_sugars' => 0,
                'cholesterol' => 16,
                'vitamin_d' => 0,
                'calcium' => 5,
                'potassium' => 46,
                'iron' => 0
            ],
            [
                'ingredient_id' => 5,
                'calories' => 2,
                'carbohydrates' => 0,
                'protein' => 1,
                'sodium' => 0,
                'fats' => 0,
                'saturated_fats' => 0,
                'trans_fats' => 0,
                'sugars' => 1,
                'added_sugars' => 0,
                'cholesterol' => 0,
                'vitamin_d' => 0,
                'calcium' => 1,
                'potassium' => 29,
                'iron' => 0
            ],
            [
                'ingredient_id' => 6,
                'calories' => 100,
                'carbohydrates' => 0,
                'protein' => 7,
                'sodium' => 248,
                'fats' => 8,
                'saturated_fats' => 5,
                'trans_fats' => 3,
                'sugars' => 0,
                'added_sugars' => 0,
                'cholesterol' => 20,
                'vitamin_d' => 0,
                'calcium' => 214,
                'potassium' => 39,
                'iron' => 0
            ],
            [
                'ingredient_id' => 7,
                'calories' => 8,
                'carbohydrates' => 2,
                'protein' => 1,
                'sodium' => 6,
                'fats' => 0,
                'saturated_fats' => 0,
                'trans_fats' => 0,
                'sugars' => 1,
                'added_sugars' => 0,
                'cholesterol' => 0,
                'vitamin_d' => 0,
                'calcium' => 10,
                'potassium' => 80,
                'iron' => 0
            ],
            [
                'ingredient_id' => 8,
                'calories' => 5,
                'carbohydrates' => 1,
                'protein' => 0,
                'sodium' => 10,
                'fats' => 0,
                'saturated_fats' => 0,
                'trans_fats' => 0,
                'sugars' => 0,
                'added_sugars' => 0,
                'cholesterol' => 0,
                'vitamin_d' => 0,
                'calcium' => 10,
                'potassium' => 30,
                'iron' => 0
            ],
            [
                'ingredient_id' => 9,
                'calories' => 350,
                'carbohydrates' => 48,
                'protein' => 4,
                'sodium' => 246,
                'fats' => 17,
                'saturated_fats' => 3,
                'trans_fats' => 1,
                'sugars' => 0,
                'added_sugars' => 0,
                'cholesterol' => 0,
                'vitamin_d' => 0,
                'calcium' => 21,
                'potassium' => 677,
                'iron' => 1
            ],
            [
                'ingredient_id' => 10,
                'calories' => 151,
                'carbohydrates' => 38,
                'protein' => 0,
                'sodium' => 37,
                'fats' => 0,
                'saturated_fats' => 0,
                'trans_fats' => 0,
                'sugars' => 38,
                'added_sugars' => 10,
                'cholesterol' => 0,
                'vitamin_d' => 0,
                'calcium' => 7,
                'potassium' => 4,
                'iron' => 0
            ],
            [
                'ingredient_id' => 11,
                'calories' => 155,
                'carbohydrates' => 38,
                'protein' => 0,
                'sodium' => 11,
                'fats' => 1,
                'saturated_fats' => 0,
                'trans_fats' => 0,
                'sugars' => 37,
                'added_sugars' => 10,
                'cholesterol' => 0,
                'vitamin_d' => 0,
                'calcium' => 4,
                'potassium' => 19,
                'iron' => 0
            ],
            [
                'ingredient_id' => 12,
                'calories' => 1,
                'carbohydrates' => 0,
                'protein' => 0,
                'sodium' => 0,
                'fats' => 0,
                'saturated_fats' => 0,
                'trans_fats' => 0,
                'sugars' => 0,
                'added_sugars' => 10,
                'cholesterol' => 0,
                'vitamin_d' => 0,
                'calcium' => 0,
                'potassium' => 0,
                'iron' => 0
            ],
        ];
        $table = $this->table('nutritional_info');

        $table->insert($data_4)
            ->save();

    }
}
