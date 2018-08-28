<?php

use yii\db\Migration;

/**
 * Handles the creation of table `fiscal_year`.
 */
class m180519_105804_create_fiscal_year_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('fiscal_year', [
            'id' => $this->primaryKey(),
            'fiscal_year' => $this->integer(),
            'start_date' => $this->date(),
            'end_date' => $this->date(),
            'is_closed' =>$this->boolean(),
            'created_by'       => $this->integer(11),
            'created_at'       => $this->integer(11),
            'updated_by'       => $this->integer(11),
            'updated_at'       => $this->integer(11),
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('fiscal_year');
    }
}
