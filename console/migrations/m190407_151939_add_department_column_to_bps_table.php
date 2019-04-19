<?php

use yii\db\Migration;

/**
 * Handles adding department to table `{{%bps}}`.
 */
class m190407_151939_add_department_column_to_bps_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('bps', 'department', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('bps', 'department');
    }
}
