<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "accounting_period".
 *
 * @property int $id
 * @property int $fiscal_year_id
 * @property string $period
 * @property string $start_date
 * @property string $end_date
 * @property int $is_closed
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class AccountingPeriod extends \common\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_period';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fiscal_year_id', 'is_closed', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['period'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fiscal_year_id' => 'Fiscal Year',
            'period' => 'Accounting Period',
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

    public function getFiscalYear() {
        return $this->hasOne(FiscalYear::className(), ['id' => 'fiscal_year_id']);
    }
    
    public function getTrxes() {
        return $this->hasMany(Trx::className(), ['accounting_period_id' => 'id']);
    }
    
    public function getAccountingPeriod() {
        return $this->period . '/' . $this->fiscalYear->fiscal_year;
    }
    
}
