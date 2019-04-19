<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%address}}`.
 */
class m190412_131504_create_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%address}}', [
            'id'            => $this->primaryKey(),
            'address'       => $this->string(255),
            'city'          => $this->string(25),
            'contact_number'=> $this->string(100),
            'employee_id'   => $this->integer(11),
            'address_type'  => $this->string(30),
            'created_by'=> $this->integer(11),
            'created_at'=> $this->integer(11),
            'updated_by'=> $this->integer(11),
            'updated_at'=> $this->integer(11),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%address}}');
    }
}
