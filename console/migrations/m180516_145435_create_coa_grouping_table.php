<?php

use yii\db\Migration;

/**
 * Handles the creation of table `coa_grouping`.
 */
class m180516_145435_create_coa_grouping_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('coa_grouping', [
            'id' => $this->primaryKey(),
            'group_name' => $this->string(100),
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
        $this->dropTable('coa_grouping');
    }
}
