<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateNutritionalInfoTable extends AbstractMigration
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
        $table = $this->table('nutritional_info', ['id' => false]);

        $table->addColumn('ingredient_id', 'integer')
            ->addColumn('calories', 'integer')
            ->addColumn('carbohydrates', 'integer')
            ->addColumn('protein', 'integer')
            ->addColumn('sodium', 'integer')
            ->addColumn('fats', 'integer')
            ->addColumn('saturated_fats', 'integer')
            ->addColumn('trans_fats', 'integer')
            ->addColumn('sugars', 'integer')
            ->addColumn('added_sugars', 'integer')
            ->addColumn('cholesterol', 'integer')
            ->addColumn('vitamin_d', 'integer')
            ->addColumn('calcium', 'integer')
            ->addColumn('potassium', 'integer')
            ->addColumn('iron', 'integer')
            ->create();
    }
}
