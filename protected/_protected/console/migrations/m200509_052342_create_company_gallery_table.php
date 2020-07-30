<?php

use yii\db\Migration;

/**
 * Handles the creation of table `company_gallery`.
 */
class m200509_052342_create_company_gallery_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('company_gallery', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->notNull(),
            'image' => $this->string(),
            'company_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('company_gallery-company' , 'company_gallery' , 'company_id' , 'company' , 'id' , 'CASCADE' , 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('company_gallery');
    }
}
