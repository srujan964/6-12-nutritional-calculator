<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class FixIngredientMapping extends AbstractMigration
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
        $update = <<<SQL
            UPDATE `menu_item_consists_of`
            SET `ingredient_id` = 13
            WHERE `item_id` = 1
            AND `ingredient_id` = 12;

            UPDATE `menu_item_consists_of`
            SET `is_default` = true
            WHERE `item_id` = 1
            AND `ingredient_id` = 13;
        SQL;

        $this->execute($update);

        $alter_pk_menu_consists_of = <<<SQL
            ALTER TABLE `menu_item_consists_of` DROP PRIMARY KEY;
            ALTER TABLE `menu_item_consists_of` ADD CONSTRAINT `pk_item_id_ingredient_id_location` PRIMARY KEY (item_id, ingredient_id, location);
        SQL;

        $this->execute($alter_pk_menu_consists_of);

        $duplicate_ingredients_for_florida = <<<SQL
            INSERT INTO `menu_item_consists_of`
            SELECT m.`item_id`, m.`ingredient_id`, m.`is_default`, 'FL'
            FROM `menu_item_consists_of` m
            WHERE `location` = 'PA';
        SQL;

        $this->execute($duplicate_ingredients_for_florida);

        $set_baguette_to_PA_only = <<<SQL
            DELETE FROM `menu_item_consists_of`
            WHERE `item_id` = 1
            AND `ingredient_id` = 1
            AND `location` = 'FL';
        SQL;

        $this->execute($set_baguette_to_PA_only);
    }
}
