<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profile}}`.
 */
class m201016_200745_create_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey(),
            'counter'=> $this->integer()->defaultValue(0),
            'user_id'=> $this->integer()->notNull(),
        ],$tableOptions);
        $this->addForeignKey('{{%fk-profile-user_id}}', '{{%profile}}', 'user_id', '{{%user}}', 'id', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%profile}}');
    }
}
