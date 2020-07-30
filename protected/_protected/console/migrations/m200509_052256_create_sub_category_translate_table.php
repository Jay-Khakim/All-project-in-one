<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sub_category_translate`.
 */
class m200509_052256_create_sub_category_translate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('sub_category_translate', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'lang_id' => $this->integer()->notNull(),
            'sub_category_id' => $this->integer()->notNull(),
            'url' => $this->string()->unique(),
            'meta_title' => $this->string(),
            'meta_description' => $this->string(),
            'meta_keywords' => $this->string(),
        ]);

        $this->addForeignKey('sub_category_translate-sub_category' , 'sub_category_translate' , 'sub_category_id' , 'sub_category' , 'id' , 'CASCADE' , 'CASCADE');
        $this->addForeignKey('sub_category_translate-lang' , 'sub_category_translate' , 'lang_id' , 'lang' , 'id' , 'CASCADE' , 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('sub_category_translate');
    }
}
