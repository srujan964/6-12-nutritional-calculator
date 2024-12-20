<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddMoreIngredients extends AbstractMigration
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
                'name' => 'Ribeye Steak',
                'description' => ''
            ],
            [
                'name' => 'Cheese Whiz',
                'description' => 'Contains Dairy'
            ],
            [
                'name' => 'Caramelized Onions',
                'description' => ''
            ],
            [
                'name' => 'Cucumbers',
                'description' => ''
            ],
            [
                'name' => 'Green Peppers',
                'description' => ''
            ],
            [
                'name' => 'Olives',
                'description' => ''
            ],
            [
                'name' => 'Meatballs',
                'description' => ''
            ],
            [
                'name' => 'Marinara Sauce',
                'description' => ''
            ],
            [
                'name' => 'Mozzarella',
                'description' => 'Conatins Dairy'
            ]
        ];

        $table = $this->table('ingredient');
        $table->insert($data)
            ->save();
    }
}
