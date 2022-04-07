<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%asset_price_history}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%asset}}`
 */
class m220407_094311_create_asset_price_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%asset_price_history}}', [
            'id' => $this->integer(),
            'asset_id' => $this->integer(),
            'date' => $this->date(),
            'price' => $this->integer(),
        ]);

        // creates index for column `asset_id`
        $this->createIndex(
            '{{%idx-asset_price_history-asset_id}}',
            '{{%asset_price_history}}',
            'asset_id'
        );

        // add foreign key for table `{{%asset}}`
        $this->addForeignKey(
            '{{%fk-asset_price_history-asset_id}}',
            '{{%asset_price_history}}',
            'asset_id',
            '{{%asset}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%asset}}`
        $this->dropForeignKey(
            '{{%fk-asset_price_history-asset_id}}',
            '{{%asset_price_history}}'
        );

        // drops index for column `asset_id`
        $this->dropIndex(
            '{{%idx-asset_price_history-asset_id}}',
            '{{%asset_price_history}}'
        );

        $this->dropTable('{{%asset_price_history}}');
    }
}
