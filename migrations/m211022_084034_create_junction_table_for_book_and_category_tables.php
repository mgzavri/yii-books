<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_category}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%book}}`
 * - `{{%category}}`
 */
class m211022_084034_create_junction_table_for_book_and_category_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_category}}', [
            'book_id' => $this->integer(),
            'category_id' => $this->integer(),
            'PRIMARY KEY(book_id, category_id)',
        ]);

        // creates index for column `book_id`
        $this->createIndex(
            '{{%idx-book_category-book_id}}',
            '{{%book_category}}',
            'book_id'
        );

        // add foreign key for table `{{%book}}`
        $this->addForeignKey(
            '{{%fk-book_category-book_id}}',
            '{{%book_category}}',
            'book_id',
            '{{%book}}',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-book_category-category_id}}',
            '{{%book_category}}',
            'category_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-book_category-category_id}}',
            '{{%book_category}}',
            'category_id',
            '{{%category}}',
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
            '{{%fk-book_category-book_id}}',
            '{{%book_category}}'
        );

        // drops index for column `book_id`
        $this->dropIndex(
            '{{%idx-book_category-book_id}}',
            '{{%book_category}}'
        );

        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-book_category-category_id}}',
            '{{%book_category}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-book_category-category_id}}',
            '{{%book_category}}'
        );

        $this->dropTable('{{%book_category}}');
    }
}
