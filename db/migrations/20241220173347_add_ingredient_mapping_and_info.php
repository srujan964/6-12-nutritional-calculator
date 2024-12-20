<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddIngredientMappingAndInfo extends AbstractMigration
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
        $mapping = [
            [
                'item_id' => 2,
                'ingredient_id' => 1,
                'is_default' => true,
                'location' => 'PA'
            ],
            [
                'item_id' => 2,
                'ingredient_id' => 14,
                'is_default' => true,
                'location' => 'PA'
            ],
            [
                'item_id' => 2,
                'ingredient_id' => 15,
                'is_default' => true,
                'location' => 'PA'
            ],
            [
                'item_id' => 2,
                'ingredient_id' => 16,
                'is_default' => true,
                'location' => 'PA'
            ],
            [
                'item_id' => 2,
                'ingredient_id' => 13,
                'is_default' => true,
                'location' => 'FL'
            ],
            [
                'item_id' => 2,
                'ingredient_id' => 14,
                'is_default' => true,
                'location' => 'FL'
            ],
            [
                'item_id' => 2,
                'ingredient_id' => 15,
                'is_default' => true,
                'location' => 'FL'
            ],
            [
                'item_id' => 2,
                'ingredient_id' => 16,
                'is_default' => true,
                'location' => 'FL'
            ],
            [
                'item_id' => 3,
                'ingredient_id' => 1,
                'is_default' => true,
                'location' => 'PA'
            ],
            [
                'item_id' => 3,
                'ingredient_id' => 5,
                'is_default' => true,
                'location' => 'PA'
            ],
            [
                'item_id' => 3,
                'ingredient_id' => 7,
                'is_default' => true,
                'location' => 'PA'
            ],
            [
                'item_id' => 3,
                'ingredient_id' => 17,
                'is_default' => true,
                'location' => 'PA'
            ],
            [
                'item_id' => 3,
                'ingredient_id' => 18,
                'is_default' => true,
                'location' => 'PA'
            ],
            [
                'item_id' => 3,
                'ingredient_id' => 19,
                'is_default' => true,
                'location' => 'PA'
            ],
            [
                'item_id' => 3,
                'ingredient_id' => 13,
                'is_default' => true,
                'location' => 'FL'
            ],
            [
                'item_id' => 3,
                'ingredient_id' => 5,
                'is_default' => true,
                'location' => 'FL'
            ],
            [
                'item_id' => 3,
                'ingredient_id' => 7,
                'is_default' => true,
                'location' => 'FL'
            ],
            [
                'item_id' => 3,
                'ingredient_id' => 17,
                'is_default' => true,
                'location' => 'FL'
            ],
            [
                'item_id' => 3,
                'ingredient_id' => 18,
                'is_default' => true,
                'location' => 'FL'
            ],
            [
                'item_id' => 3,
                'ingredient_id' => 19,
                'is_default' => true,
                'location' => 'FL'
            ],
            [
                'item_id' => 4,
                'ingredient_id' => 1,
                'is_default' => true,
                'location' => 'PA'
            ],
            [
                'item_id' => 4,
                'ingredient_id' => 20,
                'is_default' => true,
                'location' => 'PA'
            ],
            [
                'item_id' => 4,
                'ingredient_id' => 21,
                'is_default' => true,
                'location' => 'PA'
            ],
            [
                'item_id' => 4,
                'ingredient_id' => 22,
                'is_default' => true,
                'location' => 'PA'
            ],
            [
                'item_id' => 4,
                'ingredient_id' => 13,
                'is_default' => true,
                'location' => 'FL'
            ],
            [
                'item_id' => 4,
                'ingredient_id' => 20,
                'is_default' => true,
                'location' => 'FL'
            ],
            [
                'item_id' => 4,
                'ingredient_id' => 21,
                'is_default' => true,
                'location' => 'FL'
            ],
            [
                'item_id' => 4,
                'ingredient_id' => 22,
                'is_default' => true,
                'location' => 'FL'
            ]
        ];

        $menu_item_consists_of = $this->table('menu_item_consists_of');
        $menu_item_consists_of->insert($mapping)
            ->save();

        $info = [
            [
                'ingredient_id' => 14,
                'calories' => 230,
                'carbohydrates' => 0,
                'protein' => 21,
                'sodium' => 49,
                'fats' => 16,
                'saturated_fats' => 7,
                'trans_fats' => 8,
                'sugars' => 0,
                'added_sugars' => 0,
                'cholesterol' => 66,
                'vitamin_d' => 0,
                'calcium' => 10,
                'potassium' => 237,
                'iron' => 2
            ],
            [
                'ingredient_id' => 15,
                'calories' => 91,
                'carbohydrates' => 3,
                'protein' => 4,
                'sodium' => 541,
                'fats' => 7,
                'saturated_fats' => 4,
                'trans_fats' => 0,
                'sugars' => 2,
                'added_sugars' => 0,
                'cholesterol' => 25,
                'vitamin_d' => 0,
                'calcium' => 118,
                'potassium' => 79,
                'iron' => 0
            ],
            [
                'ingredient_id' => 16,
                'calories' => 41,
                'carbohydrates' => 9,
                'protein' => 1,
                'sodium' => 2,
                'fats' => 0,
                'saturated_fats' => 0,
                'trans_fats' => 0,
                'sugars' => 4,
                'added_sugars' => 0,
                'cholesterol' => 0,
                'vitamin_d' => 0,
                'calcium' => 21,
                'potassium' => 156,
                'iron' => 0
            ],
            [
                'ingredient_id' => 17,
                'calories' => 30,
                'carbohydrates' => 7,
                'protein' => 1,
                'sodium' => 2,
                'fats' => 0,
                'saturated_fats' => 0,
                'trans_fats' => 0,
                'sugars' => 4,
                'added_sugars' => 0,
                'cholesterol' => 0,
                'vitamin_d' => 0,
                'calcium' => 21,
                'potassium' => 295,
                'iron' => 0
            ],
            [
                'ingredient_id' => 18,
                'calories' => 32,
                'carbohydrates' => 7,
                'protein' => 1,
                'sodium' => 2,
                'fats' => 0,
                'saturated_fats' => 0,
                'trans_fats' => 0,
                'sugars' => 4,
                'added_sugars' => 0,
                'cholesterol' => 0,
                'vitamin_d' => 0,
                'calcium' => 10,
                'potassium' => 189,
                'iron' => 0
            ],
            [
                'ingredient_id' => 19,
                'calories' => 4,
                'carbohydrates' => 0,
                'protein' => 0,
                'sodium' => 28,
                'fats' => 0,
                'saturated_fats' => 0,
                'trans_fats' => 0,
                'sugars' => 4,
                'added_sugars' => 0,
                'cholesterol' => 0,
                'vitamin_d' => 0,
                'calcium' => 3,
                'potassium' => 0,
                'iron' => 0
            ],
            [
                'ingredient_id' => 20,
                'calories' => 143,
                'carbohydrates' => 0,
                'protein' => 31,
                'sodium' => 103,
                'fats' => 20,
                'saturated_fats' => 0,
                'trans_fats' => 0,
                'sugars' => 4,
                'added_sugars' => 0,
                'cholesterol' => 0,
                'vitamin_d' => 0,
                'calcium' => 32,
                'potassium' => 430,
                'iron' => 0
            ],
            [
                'ingredient_id' => 21,
                'calories' => 66,
                'carbohydrates' => 9,
                'protein' => 1,
                'sodium' => 577,
                'fats' => 2,
                'saturated_fats' => 0,
                'trans_fats' => 0,
                'sugars' => 4,
                'added_sugars' => 0,
                'cholesterol' => 2,
                'vitamin_d' => 0,
                'calcium' => 34,
                'potassium' => 422,
                'iron' => 0
            ],
            [
                'ingredient_id' => 22,
                'calories' => 85,
                'carbohydrates' => 0,
                'protein' => 6,
                'sodium' => 178,
                'fats' => 6,
                'saturated_fats' => 0,
                'trans_fats' => 0,
                'sugars' => 0,
                'added_sugars' => 0,
                'cholesterol' => 22,
                'vitamin_d' => 0,
                'calcium' => 143,
                'potassium' => 21,
                'iron' => 0
            ],
        ];

        $nutritional_info = $this->table('nutritional_info');

        $nutritional_info->insert($info)
            ->save();
    }
}
