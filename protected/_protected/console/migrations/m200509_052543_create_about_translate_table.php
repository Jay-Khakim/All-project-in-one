<?php

use yii\db\Migration;

/**
 * Handles the creation of table `about_translate`.
 */
class m200509_052543_create_about_translate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('about_translate', [
            'id' => $this->primaryKey(),
            'description' => $this->text(),
            'about_id' => $this->integer()->notNull(),
            'lang_id' => $this->integer()->notNull(),
            'meta_description' => $this->string(),
            'meta_keywords' => $this->string()
        ]);

        $this->addForeignKey('about_translate-about' , 'about_translate' , 'about_id' , 'about' , 'id' , 'CASCADE', 'CASCADE');
        $this->addForeignKey('about_translate-lang' , 'about_translate' , 'lang_id' , 'lang' , 'id' , 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('about_translate');
    }
}
