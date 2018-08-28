<?php

use yii\db\Migration;

/**
 * Handles the creation of table `fund`.
 */
class m180516_160147_create_fund_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('fund', [
            'id'            => $this->primaryKey(),
            'fund_id'       => $this->integer()->null(),
            'fund_name'     => $this->string(255),
            'source'        => $this->string(255),
            'remarks'       => $this->text(),
            'created_by'       => $this->integer(11),
            'created_at'       => $this->integer(11),
            'updated_by'       => $this->integer(11),
            'updated_at'       => $this->integer(11),

        ]);
        
//        //create index on fund_id column
//        $this->createIndex('idx-fund-fund_id', 'fund', 'fund_id');
//        
//        //add foriegn key for fund table
//        $this->addForeignKey('fk-fund-fund_id', 'fund', 'fund_id', 'fund', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropForeignKey('fk-fund-fund_id', 'fund');
//        $this->dropIndex('idx-fund-fund_id', 'fund');
        $this->dropTable('fund');
    }
}
