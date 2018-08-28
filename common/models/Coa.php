<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "coa".
 *
 * @property int $id
 * @property int $coa_grouping_id
 * @property string $code
 * @property string $title
 * @property string $account_type
 * @property int $coa_id
 * @property string $remarks
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class Coa extends \common\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coa_grouping_id', 'coa_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['code', 'account_type'], 'string', 'max' => 20],
            [['title', 'remarks'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'coa_grouping_id' => 'Coa Grouping ID',
            'code' => 'Code',
            'title' => 'Title',
            'account_type' => 'Account Type',
            'coa_id' => 'Coa ID',
            'remarks' => 'Remarks',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
    
    /**
     * return head of account in format code - title
     */
    public function getHeadofaccount()
    {
        return $this->code . ' - ' . $this->title;
    }
    
    /**
     * return an array of coa for dropdownlist()
     */
    public function getAll()
    {
        $result = Coa::find()->all();
        return \yii\helpers\ArrayHelper::map($result, 'id', 'Headofaccount');
    }
    
    
    /**
     * Set relation with CoaGrouping model
     */
    public function getCoagrouping() 
    {
        return $this->hasOne(CoaGrouping::className(), ['id'=>'coa_grouping_id']);
    }
    
    /**
     * get the parent CoA
     */
    public function getParent()
    {
        return $this->hasOne(Coa::className(), ['id'=>'coa_id']);
    }
    
    /**
     * get all the children CoAs
     */
    public function getChildren()
    {
        return $this->hasMany(Coa::className(), ['coa_id'=>'id']);
    }
}
