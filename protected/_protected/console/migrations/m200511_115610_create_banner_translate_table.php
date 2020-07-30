<?php

use yii\db\Migration;

/**
 * Handles the creation of table `banner_translate`.
 */
class m200511_115610_create_banner_translate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('banner_translate', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'lang_id' => $this->integer()->notNull(),
            'banner_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('banner_translate-lang' , 'banner_translate' , 'lang_id' , 'lang' , 'id' , 'CASCADE' , 'CASCADE');
        $this->addForeignKey('banner_translate-banner' , 'banner_translate' , 'banner_id' , 'banners' , 'id' , 'CASCADE' , 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('banner_translate');
    }
}
