<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_profile`.
 */
class m180107_022149_create_user_profile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql')
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('user_profile', [
            'id' => $this->primaryKey(),
            'first' => $this->string(255)->notNull(),
            'last' => $this->string(255)->notNull(),
            'phone' => $this->string(255),
            'address' => $this->string(),
            'description' => $this->string(),
            'user_id' => $this->integer()->notNull()
        ], $tableOptions);

        $this->addForeignKey('user-user_profile', 'user_profile', 'user_id', 'user', 'id', 'CASCADE', "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('user_profile');
    }
}
