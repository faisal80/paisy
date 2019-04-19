<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 */
class m190411_144944_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee}}', [
            'id' => $this->primaryKey(),
            'employee_name' => $this->string(150),
            'nic' => $this->string(13),
            'date_of_birth' => $this->date(),
            'domicile' => $this->string(100),
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
        $this->dropTable('{{%employee}}');
    }
}
