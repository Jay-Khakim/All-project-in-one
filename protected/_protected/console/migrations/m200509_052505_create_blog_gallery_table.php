<?php

use yii\db\Migration;

/**
 * Handles the creation of table `blog_gallery`.
 */
class m200509_052505_create_blog_gallery_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('blog_gallery', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->notNull(),
            'image' => $this->string(),
            'blog_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('blog_gallery-blog' , 'blog_gallery' , 'blog_id' , 'blog' , 'id' , 'CASCADE' , 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('blog_gallery');
    }
}
