<?php

use yii\db\Migration;

/**
 * Handles the creation of table `entity`.
 */
class m180516_151309_create_entity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('entity', [
            'id'            => $this->primaryKey(),
            'entity_name'   => $this->string(255),
            'entity_id'     => $this->integer()->null(),
            'created_by'       => $this->integer(11),
            'created_at'       => $this->integer(11),
            'updated_by'       => $this->integer(11),
            'updated_at'       => $this->integer(11),

        ]);
        
//        // creates index for column 'entity_id'
//        $this->createIndex('idx-entity-entity_id', 'entity', 'entity_id');
//        
//        // add foreign key for table 'entity'
//        $this->addForeignKey('fk-entity-entity_id', 'entity', 'entity_id', 'entity', 'entity_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropForeignKey('fk-entity-entity_id', 'entity');
//        $this->dropIndex('idx-entity-entity_id', 'entity');
        $this->dropTable('entity');
    }
}
