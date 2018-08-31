<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trx".
 *
 * @property int $id
 * @property int $accounting_period_id
 * @property string $description
 * @property string $trx_date
 * @property string $amount
 * @property int $balanced
 * @property int $entity_id
 * @property int $func_id
 * @property int $fund_id
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class Trx extends \common\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trx'. FiscalYear::find()->where(['is_closed' => false])->one()->fiscal_year;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['accounting_period_id', 'amount', 'balanced', 'entity_id', 'func_id', 'fund_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['trx_date'], 'safe'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'accounting_period_id' => 'Accounting Period',
            'description' => 'Description',
            'trx_date' => 'Transaction Date',
            'amount' => 'Amount',
            'balanced' => 'Balanced',
            'entity_id' => 'Entity',
            'func_id' => 'Func',
            'fund_id' => 'Fund',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    public function getTrxdetail() {
        return $this->hasMany(Trxdetail::className(), ['trx_id'=>'id']);
    }
    
    public function getAccountingPeriod() {
        return $this->hasOne(AccountingPeriod::className(), ['id'=>'accounting_period_id']);
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
}
