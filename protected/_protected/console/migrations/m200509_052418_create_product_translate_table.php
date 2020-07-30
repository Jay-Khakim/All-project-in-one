<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_translate`.
 */
class m200509_052418_create_product_translate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_translate', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'short_description' => $this->text()->notNull(),
            'description' => $this->text(),
            'lang_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'url' => $this->string()->unique(),
            'meta_title' => $this->string(),
            'meta_description' => $this->string(),
            'meta_keywords' => $this->string(),
        ]);

        $this->addForeignKey('product_translate-product' , 'product_translate' , 'product_id' , 'product' , 'id' , 'CASCADE' , 'CASCADE');
        $this->addForeignKey('product_translate-lang' , 'product_translate' , 'lang_id' , 'lang' , 'id' , 'CASCADE' , 'CASCADE');

        $this->createIndex('product_title' , 'product_translate' , 'title');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product_translate');
    }
}
