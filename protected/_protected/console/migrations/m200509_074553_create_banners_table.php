<?php

use yii\db\Migration;

/**
 * Handles the creation of table `banners`.
 */
class m200509_074553_create_banners_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('banners', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'status' => $this->integer()->notNull(),
            'page' => $this->integer()->notNull(),
            'position' => $this->integer()->notNull(),
            'link' => $this->string()
        ]);

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('banners');
    }
}
