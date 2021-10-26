<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%config}}`.
 */
class m211026_053405_create_config_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%config}}', [
            'id' => $this->primaryKey(),
            'items_per_page' => $this->integer(),
            'adminEmail' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%config}}');
    }
}
