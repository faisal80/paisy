<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "func".
 *
 * @property int $id
 * @property string $func_name
 * @property int $func_id
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class Func extends \common\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'func';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['func_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['func_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'func_name' => 'Function Name',
            'func_id' => 'Parent Function',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
    
    /**
     * return list of all functions for dropdownlist
     */
    public function getAll() {
        return \yii\helpers\ArrayHelper::map(Func::find()->all(),'id','func_name');
    }
    
    /**
     * get parent function
     */
    public function getParent() {
        return $this->hasOne(Func::className(), ['id'=>'func_id']);
    }
    
    /**
     * get Children functions
     */
    public function getChildren() {
        return $this->hasMany(Func::className(), ['func_id'=>'id']);
    }
}
