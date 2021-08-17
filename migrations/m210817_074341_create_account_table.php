<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%account}}`.
 */
class m210817_074341_create_account_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%account}}', [
            'id' => $this->primaryKey(),
            'account_type' => $this->string(55)->notNull(),
            'account_holder' => $this->string(99)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%account}}');
    }
}
