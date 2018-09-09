<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trxdetail2017".
 *
 * @property int $id
 * @property int $coa_id
 * @property int $trx_id
 * @property string $debit
 * @property string $credit
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class Trxdetail extends \common\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trxdetail'. FiscalYear::find()->where(['is_closed' => false])->one()->fiscal_year;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coa_id', 'trx_id', 'debit','credit', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'coa_id'     => 'Coa ID',
            'trx_id'     => 'Trx ID',
            'debit'      => 'Debit',
            'credit'     => 'Credit',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
    
    public function getTrx() {
        return $this->hasOne(Trx::className(), ['id'=>'trx_id']);
    }
    
    public function getCoa() {
        return $this->hasOne(Coa::className(), ['id' => 'coa_id']);
    }
}
