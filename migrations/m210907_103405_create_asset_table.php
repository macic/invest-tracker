<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%asset}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%account}}`
 */
class m210907_103405_create_asset_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%asset}}', [
            'id' => $this->primaryKey(),
            'account_id' => $this->integer(11),
            'name' => $this->string(255),
            'ticker' => $this->string(255)->Null(),
            'buy_price' => $this->decimal(10, 2)->notNull(),
            'last_price' => $this->decimal(10, 2)->Null(),
            'quantity' => $this->integer(255)->notNull(),
            'buy_date' => $this->integer(11)->Null(),
        ]);

        // creates index for column `account_id`
        $this->createIndex(
            '{{%idx-asset-account_id}}',
            '{{%asset}}',
            'account_id'
        );

        // add foreign key for table `{{%account}}`
        $this->addForeignKey(
            '{{%fk-asset-account_id}}',
            '{{%asset}}',
            'account_id',
            '{{%account}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%account}}`
        $this->dropForeignKey(
            '{{%fk-asset-account_id}}',
            '{{%asset}}'
        );

        // drops index for column `account_id`
        $this->dropIndex(
            '{{%idx-asset-account_id}}',
            '{{%asset}}'
        );

        $this->dropTable('{{%asset}}');
    }
}
