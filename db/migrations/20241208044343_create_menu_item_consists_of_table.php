<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateMenuItemConsistsOfTable extends AbstractMigration
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
        $table = $this->table('menu_item_consists_of', ['id' => false, 'primary_key' => ['item_id', 'ingredient_id']]);

        $table->addColumn('item_id', 'integer', ['null' => false])
            ->addColumn('ingredient_id', 'integer', ['null' => false])
            ->create();
    }
}
