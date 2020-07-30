<?php

use yii\db\Migration;

/**
 * Handles the creation of table `carousel`.
 */
class m200509_052555_create_carousel_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('carousel', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->notNull(),
            'sort' => $this->integer()->notNull(),
            'image' => $this->string(),
            'created_at' => $this->string()->notNull(),
            'product_id' => $this->integer()
        ]);

        $this->addForeignKey('carousel-product' , 'carousel' , 'product_id' , 'product' , 'id' , 'RESTRICT' , 'RESTRICT');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('carousel');
    }
}
