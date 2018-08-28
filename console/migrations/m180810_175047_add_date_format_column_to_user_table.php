<?php

use yii\db\Migration;

/**
 * Handles adding date_format to table `user`.
 */
class m180810_175047_add_date_format_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'date_format', $this->string(5));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'date_format');
    }
}
