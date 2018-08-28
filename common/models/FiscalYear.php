<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fiscal_year".
 *
 * @property int $id
 * @property int $fiscal_year
 * @property string $start_date
 * @property string $end_date
 * @property int $is_closed
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class FiscalYear extends \common\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fiscal_year';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['is_closed'], 'in','not'=>true, 'range'=>
            //     function($model, $attribute) {
            //         // compute range
            //         return $range;
            //     }
            // ],
            [['fiscal_year', 'is_closed', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fiscal_year' => 'Fiscal Year',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'is_closed' => 'Closed',
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
        $this->fixDate($this, 'start_date');
        $this->fixDate($this, 'end_date');
        
        return true;
    }    
    
    public function afterFind() {
        parent::afterFind();
        
        $this->fixDate($this, 'start_date', false);
        $this->fixDate($this, 'end_date', false);
    }

    public function getAccountingPeriods() {
        return $this->hasMany(AccountingPeriod::className(), ['fiscal_year_id' => 'id']);
    }
}
