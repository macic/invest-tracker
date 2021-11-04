<?php

use yii\db\Migration;

/**
 * Class m211104_083052_rename_account_holder_column
 */
class m211104_083052_rename_account_holder_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('{{%account}}', 'account_holder', 'account_holder_id');
        $this->alterColumn('{{%account}}', 'account_holder_id', $this->integer());
        // creates index for column `account_id`
        $this->createIndex(
            '{{%idx-account-holder-id-idx}}',
            '{{%account}}',
            'account_holder_id'
        );

        // add foreign key for table `{{%account}}`
        $this->addForeignKey(
            '{{%fk-account-holder-id}}',
            '{{%account}}',
            'account_holder_id',
            '{{%account_holder}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('{{%account}}', 'account_holder_id', 'account_holder');
        //@todo add foreign key constraint to account
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211104_083052_rename_account_holder_column cannot be reverted.\n";

        return false;
    }
    */
}
