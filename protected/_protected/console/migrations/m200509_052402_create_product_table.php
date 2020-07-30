<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m200509_052402_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->notNull(),
            'sort' => $this->integer()->defaultValue(0),
            'image'=> $this->string(),
            'price' => $this->string(),
            'created_at' => $this->string()->notNull(),
            'visit' => $this->integer(),
            'sub_category_id' => $this->integer()->notNull(),
            'company_id' => $this->integer()->notNull(),
            'type' => $this->integer()
        ]);

        $this->addForeignKey('product-sub_category' , 'product' , 'sub_category_id' , 'sub_category' , 'id' , 'RESTRICT' , 'CASCADE');
        $this->addForeignKey('product-company' , 'product' , 'company_id' , 'company' , 'id' , 'RESTRICT' , 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product');
    }
}
