<?php

use yii\db\Migration;

/**
 * Handles the creation of table `carousel_translate`.
 */
class m200509_052607_create_carousel_translate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('carousel_translate', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'lang_id' => $this->integer()->notNull(),
            'carousel_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('carousel_translate-carousel' , 'carousel_translate' , 'carousel_id' , 'carousel' , 'id' , 'CASCADE');
        $this->addForeignKey('carousel_translate-lang' , 'carousel_translate' , 'lang_id' , 'lang' , 'id' , 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('carousel_translate');
    }
}
