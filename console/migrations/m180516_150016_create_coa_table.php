<?php

use yii\db\Migration;

/**
 * Handles the creation of table `coa`.
 */
class m180516_150016_create_coa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('coa', [
            'id'                => $this->primaryKey(),
            'coa_grouping_id'   => $this->integer(),
            'code'              => $this->string(20),
            'title'             => $this->string(255),
            'account_type'      => $this->string(20),
            'coa_id'            => $this->integer()->null(),
            'remarks'           => $this->string(255),
            'created_by'       => $this->integer(11),
            'created_at'       => $this->integer(11),
            'updated_by'       => $this->integer(11),
            'updated_at'       => $this->integer(11),
            
        ]);
        
//        // creates index for column 'coa_grouping_id'
//        $this->createIndex('idx-coa-coa_grouping_id', 'coa', 'coa_grouping_id');
//        
//        // add foreign key for table 'coa_grouping'
//        $this->addForeignKey(
//            'fk-coa-coa_grouping_id', 
//            'coa', 
//            'coa_grouping_id', 
//            'coa_grouping', 
//            'id'
//        );
//        
//        // creates index for column 'coa_id'
//        $this->createIndex('idx-coa-coa_id', 'coa', 'coa_id');
//        
//        // add foreign key for table 'coa'
//        $this->addForeignKey(
//            'fk-coa-coa_id', 
//            'coa', 
//            'coa_id', 
//            'coa', 
//            'id'
//        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropForeignKey('fk-coa-coa_id', 'coa');
//        $this->dropIndex('idx-coa-coa_id', 'coa');
//        $this->dropForeignKey('fk-coa-coa_grouping_id', 'coa');
//        $this->dropIndex('idx-coa-coa_grouping_id', 'coa');
        $this->dropTable('coa');
    }
}
