<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%account_holder}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%account}}`
 */
class m211104_083055_create_account_holder_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%account_holder}}', [
            'id' => $this->primaryKey(),
            'id' => $this->integer()->notNull().' AUTO_INCREMENT',
            'name' => $this->string(99),
        ]);

        // creates index for column `id`
        $this->createIndex(
            '{{%idx-account_holder-id}}',
            '{{%account_holder}}',
            'id'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('{{%account_holder}}');
    }
}
