<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "coa_grouping".
 *
 * @property int $id
 * @property string $group_name
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class CoaGrouping extends \common\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coa_grouping';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['group_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_name' => 'Group Name',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
    
    /**
     * return an array of coa groupings for dropdownlist()
     */
    public function getAll()
    {
        $result = CoaGrouping::find()->all();
        return \yii\helpers\ArrayHelper::map($result, 'id', 'group_name');
    }
    
    /**
     * Set the relation with Coa model
     */
    public function getCoa()
    {
        return $this->hasMany(Coa::className(), ['id'=>'coa_grouping_id']);
    }
    
}
