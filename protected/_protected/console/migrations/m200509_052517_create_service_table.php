<?php

use yii\db\Migration;

/**
 * Handles the creation of table `service`.
 */
class m200509_052517_create_service_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('service', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->unique(),
            'status' => $this->integer()->notNull(),
            'sort' => $this->integer()->defaultValue(0),
            'image' => $this->string(),
            'created_at' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'website' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('service');
    }
}
