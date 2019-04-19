<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%family_member}}`.
 */
class m190413_074729_create_family_member_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%family_member}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150),
            'father_name' => $this->string(150),
            'relation' => $this->string(100),
            'nic' => $this->string(13),
            'gpf_share' => $this->string(5),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%family_member}}');
    }
}
