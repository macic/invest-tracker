<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%asset}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%portfolio}}`
 */
class m210930_110824_add_portfolio_id_column_to_asset_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%asset}}', 'portfolio_id', $this->integer());

        // creates index for column `portfolio_id`
        $this->createIndex(
            '{{%idx-asset-portfolio_id}}',
            '{{%asset}}',
            'portfolio_id'
        );

        // add foreign key for table `{{%portfolio}}`
        $this->addForeignKey(
            '{{%fk-asset-portfolio_id}}',
            '{{%asset}}',
            'portfolio_id',
            '{{%portfolio}}',
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
            '{{%fk-asset-portfolio_id}}',
            '{{%asset}}'
        );

        // drops index for column `portfolio_id`
        $this->dropIndex(
            '{{%idx-asset-portfolio_id}}',
            '{{%asset}}'
        );

        $this->dropColumn('{{%asset}}', 'portfolio_id');
    }
}
