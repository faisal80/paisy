<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "entity".
 *
 * @property int $id
 * @property string $entity_name
 * @property int $entity_id
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class Entity extends \common\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entity_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['entity_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entity_name' => 'Entity Name',
            'entity_id' => 'Parent Entity',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
    
    /**
     * return all entities for dropdownlist
     */
    public function getAll()
    {
        return \yii\helpers\ArrayHelper::map(Entity::find()->all(),'id','entity_name');
    }
    
    /**
     * get parent entity
     */
    public function getParent()
    {
        return $this->hasOne(Entity::className(), ['id'=>'entity_id']);
    }
    
    /**
     * get all children entities
     */
    public function getChildren()
    {
        return $this->hasMany(Entity::className(), ['entity_id'=>'id']);
    }
}
