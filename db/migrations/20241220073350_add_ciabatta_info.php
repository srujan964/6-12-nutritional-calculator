<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddCiabattaInfo extends AbstractMigration
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
        $data = [
            [
                'ingredient_id' => 13,
                'calories' => 82,
                'carbohydrates' => 15,
                'protein' => 3,
                'sodium' => 152,
                'fats' => 1,
                'saturated_fats' => 0,
                'trans_fats' => 0,
                'sugars' => 2,
                'added_sugars' => 0,
                'cholesterol' => 0,
                'vitamin_d' => 0,
                'calcium' => 45,
                'potassium' => 39,
                'iron' => 1
            ]
        ];

        $table = $this->table('nutritional_info');
        $table->insert($data)
        ->save();
    }
}
