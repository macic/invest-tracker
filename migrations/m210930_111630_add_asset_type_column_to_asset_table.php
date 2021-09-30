<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%asset}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%asset_type}}`
 */
class m210930_111630_add_asset_type_column_to_asset_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%asset}}', 'asset_type', $this->integer());

        // creates index for column `asset_type`
        $this->createIndex(
            '{{%idx-asset-asset_type}}',
            '{{%asset}}',
            'asset_type'
        );

        // add foreign key for table `{{%asset_type}}`
        $this->addForeignKey(
            '{{%fk-asset-asset_type}}',
            '{{%asset}}',
            'asset_type',
            '{{%asset_type}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%asset_type}}`
        $this->dropForeignKey(
            '{{%fk-asset-asset_type}}',
            '{{%asset}}'
        );

        // drops index for column `asset_type`
        $this->dropIndex(
            '{{%idx-asset-asset_type}}',
            '{{%asset}}'
        );

        $this->dropColumn('{{%asset}}', 'asset_type');
    }
}
