<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_gallery`.
 */
class m200509_052426_create_product_gallery_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_gallery', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'image' => $this->string()
        ]);

        $this->addForeignKey('product_gallery-product' , 'product_gallery' , 'product_id' , 'product' , 'id' , 'CASCADE' , 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product_gallery');
    }
}
