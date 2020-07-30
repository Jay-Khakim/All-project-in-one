<?php

use yii\db\Migration;

/**
 * Handles the creation of table `company_translate`.
 */
class m200509_052328_create_company_translate_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('company_translate', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'description' => $this->text(),
            'lang_id' => $this->integer()->notNull(),
            'company_id' => $this->integer()->notNull(),
            'url' => $this->string()->unique(),
            'meta_title' => $this->string(),
            'meta_description' => $this->text(),
            'meta_keywords' => $this->string()
        ]);

        $this->addForeignKey('company_translate-company' , 'company_translate' , 'company_id' , 'company' , 'id' , 'CASCADE' , 'CASCADE');
        $this->addForeignKey('company_translate-lang' , 'company_translate' , 'lang_id' , 'lang' , 'id' , 'CASCADE' , 'CASCADE');


        $this->createIndex('company_title' , 'company_translate' , 'title');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('company_translate');
    }
}
