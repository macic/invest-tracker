<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%asset}}`.
 */
class m210930_112002_drop_type_column_from_asset_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%asset}}', 'type');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%asset}}', 'type', $this->string(255));
    }
}
