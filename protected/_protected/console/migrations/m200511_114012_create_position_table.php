<?php

use yii\db\Migration;

/**
 * Handles the creation of table `position`.
 */
class m200511_114012_create_position_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('position', [
            'id' => $this->primaryKey(),
            'status' => $this->integer()->notNull(),
            'position' => $this->integer()->notNull(),
            'name' => $this->string()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('position');
    }
}
