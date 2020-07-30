<?php

use yii\db\Migration;

/**
 * Handles the creation of table `blog_translate`.
 */
class m200509_052458_create_blog_translate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('blog_translate', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'lang_id' => $this->integer()->notNull(),
            'blog_id' => $this->integer()->notNull(),
            'url' => $this->string()->unique(),
            'meta_title' => $this->string(),
            'meta_description' => $this->string(),
            'meta_keywords' => $this->string(),
        ]);

        $this->addForeignKey('blog_translate-blog' , 'blog_translate' , 'blog_id' , 'blog' , 'id' , 'CASCADE' , 'CASCADE');
        $this->addForeignKey('blog_translate-lang' , 'blog_translate' , 'lang_id' , 'lang' , 'id' , 'CASCADE' , 'CASCADE');

        $this->createIndex('blog_title' , 'blog_translate' , 'title');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('blog_translate');
    }
}
