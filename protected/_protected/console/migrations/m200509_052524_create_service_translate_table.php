<?php

use yii\db\Migration;

/**
 * Handles the creation of table `service_translate`.
 */
class m200509_052524_create_service_translate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('service_translate', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'short_description' => $this->text()->notNull(),
            'description' => $this->string(),
            'lang_id' => $this->integer()->notNull(),
            'service_id' => $this->integer()->notNull(),
            'url' => $this->string()->unique(),
            'meta_title' => $this->string(),
            'meta_description' => $this->string(),
            'meta_keywords' => $this->string()
        ]);

        $this->addForeignKey('service_translate-service' , 'service_translate' , 'service_id' , 'service' , 'id' , 'CASCADE' , 'CASCADE');
        $this->addForeignKey('service_translate-lang' , 'service_translate' , 'lang_id' , 'lang' , 'id' , 'CASCADE' , 'CASCADE');


        $this->createIndex('service_title' , 'service_translate' , 'title');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('service_translate');
    }
}
