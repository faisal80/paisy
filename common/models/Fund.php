<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fund".
 *
 * @property int $id
 * @property int $fund_id
 * @property string $fund_name
 * @property string $source
 * @property string $remarks
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class Fund extends \common\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fund';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fund_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['remarks'], 'string'],
            [['fund_name', 'source'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fund_id' => 'Parent Fund',
            'fund_name' => 'Fund Name',
            'source' => 'Source',
            'remarks' => 'Remarks',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
    
    /**
     * return list of funds for dropdownlist
     */
    public function getAll()
    {
        return \yii\helpers\ArrayHelper::map(Fund::find()->all(), 'id', 'fund_name');
    }
    
    /**
     * get Parent Fund
     */
    public function getParent()
    {
        return $this->hasOne(Fund::className(), ['id'=>'fund_id']);
    }
    
    /**
     * get Children funds
     */
    public function getChildren() {
        return $this->hasMany(Fund::className(), ['fund_id'=>'id']);
    }
}
