<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sub_category`.
 */
class m200509_052248_create_sub_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('sub_category', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->notNull(),
            'sort' => $this->integer()->defaultValue(0),
            'image' => $this->string(),
            'created_at' => $this->string()->notNull(),
            'category_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('sub_category-category' , 'sub_category' , 'category_id' , 'category' , 'id' , 'RESTRICT' , 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('sub_category');
    }
}
