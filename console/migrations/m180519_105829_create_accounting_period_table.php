<?php

use yii\db\Migration;

/**
 * Handles the creation of table `accounting_period`.
 */
class m180519_105829_create_accounting_period_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('accounting_period', [
            'id' => $this->primaryKey(),
            'fiscal_year_id' => $this->integer(),
            'period' => $this->string(20),
            'start_date' => $this->date(),
            'end_date' => $this->date(),
            'is_closed' => $this->boolean(),
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
        $this->dropTable('accounting_period');
    }
}
