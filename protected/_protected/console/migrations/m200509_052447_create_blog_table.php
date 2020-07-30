<?php

use yii\db\Migration;

/**
 * Handles the creation of table `blog`.
 */
class m200509_052447_create_blog_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('blog', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->notNull(),
            'sort' => $this->integer()->defaultValue(0),
            'image' => $this->string(),
            'created_at' => $this->string()->notNull(),
            'type' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('blog');
    }
}
