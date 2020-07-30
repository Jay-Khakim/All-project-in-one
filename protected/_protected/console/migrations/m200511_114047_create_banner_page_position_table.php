<?php

use yii\db\Migration;

/**
 * Handles the creation of table `banner_page_position`.
 */
class m200511_114047_create_banner_page_position_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('banner_page_position', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->notNull(),
            'sort' => $this->integer()->defaultValue(0),
            'page_id' => $this->integer()->notNull(),
            'position_id' => $this->integer()->notNull(),
            'banner_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('banner_page_position-page' , 'banner_page_position' , 'page_id' , 'page' , 'id' , 'CASCADE' , 'CASCADE');
        $this->addForeignKey('banner_page_position-position' , 'banner_page_position' , 'position_id' , 'position' , 'id' , 'CASCADE' , 'CASCADE');
        $this->addForeignKey('banner_page_position-banner' , 'banner_page_position' , 'banner_id' , 'banners' , 'id' , 'CASCADE' , 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('banner_page_position');
    }
}
