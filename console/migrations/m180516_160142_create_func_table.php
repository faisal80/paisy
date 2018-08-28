<?php

use yii\db\Migration;

/**
 * Handles the creation of table `func`.
 */
class m180516_160142_create_func_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('func', [
            'id'            => $this->primaryKey(),
            'func_name'     => $this->string(255),
            'func_id'       => $this->integer()->null(),
            'created_by'       => $this->integer(11),
            'created_at'       => $this->integer(11),
            'updated_by'       => $this->integer(11),
            'updated_at'       => $this->integer(11),

        ]);
        
//        // create index on func_id column
//        $this->createIndex('idx-func-func_id', 'func', 'func_id');
//        
//        // add foreign key for func table
//        $this->addForeignKey('fk-func-func_id', 'func', 'fund_id', 'func', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropForeignKey('fk-func_func_id', 'func');
//        $this->dropIndex('idx-func-func_id', 'func');
        
        $this->dropTable('func');
    }
}
