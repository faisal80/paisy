<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "balance".
 *
 * @property int $id
 * @property string $amount
 * @property int $fiscal_year_id
 * @property int $coa_id
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class Balance extends \common\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'balance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'fiscal_year_id', 'coa_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'fiscal_year_id' => 'Fiscal Year',
            'coa_id' => 'G/L Account',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
    
    public function getFiscalYear() {
        return $this->hasOne(FiscalYear::className(), ['id' => 'fiscal_year_id']);
    }
    
    public function getHeadofAccount() {
        return $this->hasOne(Coa::className(), ['id'=>'coa_id']);
    }
}
