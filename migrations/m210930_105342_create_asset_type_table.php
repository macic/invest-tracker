<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%asset_type}}`.
 */
class m210930_105342_create_asset_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%asset_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%asset_type}}');
    }
}
