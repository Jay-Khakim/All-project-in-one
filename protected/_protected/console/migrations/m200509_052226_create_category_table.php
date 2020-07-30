<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m200509_052226_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->notNull(),
            'sort' => $this->integer()->defaultValue(0),
            'created_at' => $this->string()->notNull(),
            'icon' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('category');
    }
}
