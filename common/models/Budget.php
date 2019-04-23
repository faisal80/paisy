<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "budget2017".
 *
 * @property int $id
 * @property string $reference_no
 * @property string $date
 * @property string $start_date
 * @property string $end_date Description
 * @property int $entity_id
 * @property int $func_id
 * @property int $fund_id
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class Budget extends \common\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'budget'. FiscalYear::find()->where(['is_closed' => false])->one()->fiscal_year;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'start_date', 'end_date'], 'safe'],
            [['entity_id', 'func_id', 'fund_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['reference_no'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reference_no' => 'Reference No',
            'date' => 'Date',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'entity_id' => 'Entity ID',
            'func_id' => 'Func ID',
            'fund_id' => 'Fund ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
    
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        // ...custom code here...
        $this->fixDate($this, 'date');
        $this->fixDate($this, 'start_date');
        $this->fixDate($this, 'end_date');
        
        return true;
    }    
    
    public function afterFind() {
        parent::afterFind();
        
        $this->fixDate($this, 'date', false);
        $this->fixDate($this, 'start_date', false);
        $this->fixDate($this, 'end_date', false);
    }    
    
    public function getEntity() {
        return $this->hasOne(Entity::className(), ['id' => 'entity_id']);
    }
    
    public function getFunc() {
        return $this->hasOne(Func::className(), ['id' => 'func_id']);
    }
    
    public function getFund() {
        return $this->hasOne(Fund::className(), ['id' => 'fund_id']);
    }
    
    public function getBudgetDetail() {
        return $this->hasMany(BudgetDetail::className(), ['budget_id'=>'id']);
    }
}
