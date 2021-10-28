<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%asset}}`.
 */
class m211028_094851_add_buy_date_column_to_asset_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%asset}}', 'buy_date', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%asset}}', 'buy_date');
    }
}
