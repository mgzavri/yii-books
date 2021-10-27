<?php

use yii\db\Migration;
use yii\web\YiiAsset;
/**
 * Handles the creation of table `{{%author}}`.
 */
class m211022_083642_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->unique()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%author}}');
    }
}
