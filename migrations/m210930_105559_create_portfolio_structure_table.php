<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%portfolio_structure}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%portfolio}}`
 * - `{{%asset_type}}`
 */
class m210930_105559_create_portfolio_structure_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%portfolio_structure}}', [
            'id' => $this->primaryKey(),
            'portfolio_id' => $this->integer(),
            'asset_type' => $this->integer(),
            'percentage' => $this->integer(),
        ]);

        // creates index for column `portfolio_id`
        $this->createIndex(
            '{{%idx-portfolio_structure-portfolio_id}}',
            '{{%portfolio_structure}}',
            'portfolio_id'
        );

        // add foreign key for table `{{%portfolio}}`
        $this->addForeignKey(
            '{{%fk-portfolio_structure-portfolio_id}}',
            '{{%portfolio_structure}}',
            'portfolio_id',
            '{{%portfolio}}',
            'id',
            'CASCADE'
        );

        // creates index for column `asset_type`
        $this->createIndex(
            '{{%idx-portfolio_structure-asset_type}}',
            '{{%portfolio_structure}}',
            'asset_type'
        );

        // add foreign key for table `{{%asset_type}}`
        $this->addForeignKey(
            '{{%fk-portfolio_structure-asset_type}}',
            '{{%portfolio_structure}}',
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
        // drops foreign key for table `{{%portfolio}}`
        $this->dropForeignKey(
            '{{%fk-portfolio_structure-portfolio_id}}',
            '{{%portfolio_structure}}'
        );

        // drops index for column `portfolio_id`
        $this->dropIndex(
            '{{%idx-portfolio_structure-portfolio_id}}',
            '{{%portfolio_structure}}'
        );

        // drops foreign key for table `{{%asset_type}}`
        $this->dropForeignKey(
            '{{%fk-portfolio_structure-asset_type}}',
            '{{%portfolio_structure}}'
        );

        // drops index for column `asset_type`
        $this->dropIndex(
            '{{%idx-portfolio_structure-asset_type}}',
            '{{%portfolio_structure}}'
        );

        $this->dropTable('{{%portfolio_structure}}');
    }
}
