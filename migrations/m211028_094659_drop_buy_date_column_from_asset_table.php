<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%asset}}`.
 */
class m211028_094659_drop_buy_date_column_from_asset_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%asset}}', 'buy_date');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%asset}}', 'buy_date', $this->integer(11));
    }
}
