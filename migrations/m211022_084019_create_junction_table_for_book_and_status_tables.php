<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_status}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%book}}`
 * - `{{%status}}`
 */
class m211022_084019_create_junction_table_for_book_and_status_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_status}}', [
            'book_id' => $this->integer(),
            'status_id' => $this->integer(),
            'PRIMARY KEY(book_id, status_id)',
        ]);

        // creates index for column `book_id`
        $this->createIndex(
            '{{%idx-book_status-book_id}}',
            '{{%book_status}}',
            'book_id'
        );

        // add foreign key for table `{{%book}}`
        $this->addForeignKey(
            '{{%fk-book_status-book_id}}',
            '{{%book_status}}',
            'book_id',
            '{{%book}}',
            'id',
            'CASCADE'
        );

        // creates index for column `status_id`
        $this->createIndex(
            '{{%idx-book_status-status_id}}',
            '{{%book_status}}',
            'status_id'
        );

        // add foreign key for table `{{%status}}`
        $this->addForeignKey(
            '{{%fk-book_status-status_id}}',
            '{{%book_status}}',
            'status_id',
            '{{%status}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%book}}`
        $this->dropForeignKey(
            '{{%fk-book_status-book_id}}',
            '{{%book_status}}'
        );

        // drops index for column `book_id`
        $this->dropIndex(
            '{{%idx-book_status-book_id}}',
            '{{%book_status}}'
        );

        // drops foreign key for table `{{%status}}`
        $this->dropForeignKey(
            '{{%fk-book_status-status_id}}',
            '{{%book_status}}'
        );

        // drops index for column `status_id`
        $this->dropIndex(
            '{{%idx-book_status-status_id}}',
            '{{%book_status}}'
        );

        $this->dropTable('{{%book_status}}');
    }
}
