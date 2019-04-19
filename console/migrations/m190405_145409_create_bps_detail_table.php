<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bps_detail}}`.
 */
class m190405_145409_create_bps_detail_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bps_detail}}', [
            'id'        => $this->primaryKey(),
            'bps_id'    => $this->integer(),
            'bps'       => $this->tinyInteger(2),
            'minimum'   => $this->integer(),
            'increment' => $this->integer(),
            'maximum'   => $this->integer(),
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
        $this->dropTable('{{%bps_detail}}');
    }
}
