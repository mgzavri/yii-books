<?php

use yii\db\Migration;
use yii\web\YiiAsset;
/**
 * Handles the creation of table `{{%category}}`.
 */
class m211022_084000_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->unique()->notNull(),
            'parent'=>$this->integer()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
