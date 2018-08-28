<?php

use yii\db\Migration;

/**
 * Handles the creation of table `balance`.
 */
class m180814_153050_create_balance_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('balance', [
            'id' => $this->primaryKey(),
            'amount' => $this->bigInteger(),
            'fiscal_year_id' => $this->integer(),
            'coa_id' => $this->integer(),
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
        $this->dropTable('balance');
    }
}
