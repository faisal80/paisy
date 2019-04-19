<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bps}}`.
 */
class m190405_144858_create_bps_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bps}}', [
            'id'            => $this->primaryKey(),
            'wef'           => $this->date(),
            'reference_no'  => $this->string(150),
            'date'          => $this->date(),
            'created_by'    => $this->integer(11),
            'created_at'    => $this->integer(11),
            'updated_by'    => $this->integer(11),
            'updated_at'    => $this->integer(11),
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%bps}}');
    }
}
