<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class MigrateMenuItemConsistsOfDataToIncludeDefaultIngredientsAndLocation extends AbstractMigration
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
    public function up(): void
    {
        // $table = $this->table('menu_item_consists_of');
        $insert_bread = <<<SQL
            INSERT INTO `ingredient`(name, description) values('Ciabatta', '');
            INSERT INTO `menu_item_consists_of` values (1, 12, true, 'FL');
        SQL;


        $this->execute($insert_bread);

        $update_to_FL = <<<SQL
            UPDATE `menu_item_consists_of`
            SET `location` = 'FL'
            WHERE `ingredient_id` = 13;
        SQL;

        $this->execute($update_to_FL);

        $set_default_enabled = <<<SQL
            UPDATE `menu_item_consists_of`
            SET `is_default` = false
            WHERE `ingredient_id` IN (4, 8, 12);
        SQL;

        $this->execute($set_default_enabled);
    }

    public function down(): void {}
}
