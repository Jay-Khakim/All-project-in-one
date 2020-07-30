<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category_translate`.
 */
class m200509_052235_create_category_translate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category_translate', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'lang_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'url' => $this->string()->unique(),
            'meta_title' => $this->string(),
            'meta_description' => $this->string(),
            'meta_keywords' => $this->string()
        ]);

        $this->addForeignKey('category_translate-category' , 'category_translate' , 'category_id' , 'category' , 'id' , 'CASCADE' , 'CASCADE');
        $this->addForeignKey('category_translate-lang' , 'category_translate' , 'lang_id' , 'lang' , 'id' , 'CASCADE' , 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('category_translate');
    }
}
