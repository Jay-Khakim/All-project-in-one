<?php

use yii\db\Migration;

/**
 * Handles the creation of table `company`.
 */
class m200509_052321_create_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('company', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->unique(),
            'website' => $this->string(),
            'phone' => $this->string()->notNull(),
            'status' => $this->integer()->notNull(),
            'sort' => $this->integer()->defaultValue(0),
            'image' => $this->string(),
            'type' => $this->integer()->notNull(),
            'password_hash' => $this->string()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'account_activation_token' => $this->string(),
            'created_at' => $this->string()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('company');
    }
}
