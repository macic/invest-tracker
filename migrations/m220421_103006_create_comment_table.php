<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%portfolio}}`
 * - `{{%asset}}`
 */
class m220421_103006_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'portfolio_id' => $this->integer(),
            'asset_id' => $this->integer(),
            'date' => $this->date(),
            'textarea' => $this->text()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-comment-user_id}}',
            '{{%comment}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-comment-user_id}}',
            '{{%comment}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `portfolio_id`
        $this->createIndex(
            '{{%idx-comment-portfolio_id}}',
            '{{%comment}}',
            'portfolio_id'
        );

        // add foreign key for table `{{%portfolio}}`
        $this->addForeignKey(
            '{{%fk-comment-portfolio_id}}',
            '{{%comment}}',
            'portfolio_id',
            '{{%portfolio}}',
            'id',
            'CASCADE'
        );

        // creates index for column `asset_id`
        $this->createIndex(
            '{{%idx-comment-asset_id}}',
            '{{%comment}}',
            'asset_id'
        );

        // add foreign key for table `{{%asset}}`
        $this->addForeignKey(
            '{{%fk-comment-asset_id}}',
            '{{%comment}}',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-comment-user_id}}',
            '{{%comment}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-comment-user_id}}',
            '{{%comment}}'
        );

        // drops foreign key for table `{{%portfolio}}`
        $this->dropForeignKey(
            '{{%fk-comment-portfolio_id}}',
            '{{%comment}}'
        );

        // drops index for column `portfolio_id`
        $this->dropIndex(
            '{{%idx-comment-portfolio_id}}',
            '{{%comment}}'
        );

        // drops foreign key for table `{{%asset}}`
        $this->dropForeignKey(
            '{{%fk-comment-asset_id}}',
            '{{%comment}}'
        );

        // drops index for column `asset_id`
        $this->dropIndex(
            '{{%idx-comment-asset_id}}',
            '{{%comment}}'
        );

        $this->dropTable('{{%comment}}');
    }
}
