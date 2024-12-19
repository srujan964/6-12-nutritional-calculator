<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class NutritionalInfoSeed extends AbstractSeed
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

        $table->insert($data)
            ->save();
    }
}
