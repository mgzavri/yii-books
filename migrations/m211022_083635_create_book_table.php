<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m211022_083635_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'isbn' => $this->integer()->unique(),
            'pageCount'=>$this->integer(),
            'publishedDate'=>$this->dateTime(),
            'thumbnailUrl'=>$this->string(),
            'shortDescription'=>$this->text(),
            'longDescription'=>$this->text(),
            'status'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book}}');
    }
}
