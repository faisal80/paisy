<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "budget_detail2017".
 *
 * @property int $id
 * @property int $allocation
 * @property int $release
 * @property int $coa_id
 * @property int $budget_id
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class BudgetDetail extends \common\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'budget_detail'. FiscalYear::find()->where(['is_closed' => false])->one()->fiscal_year;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['allocation', 'release', 'coa_id', 'budget_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'allocation' => 'Allocation',
            'release' => 'Release',
            'coa_id' => 'Head of Account',
            'budget_id' => 'Budget ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
    
    public function getHeadofAccount() {
        return $this->hasOne(Coa::className(), ['id' => 'coa_id']);
    }

    public function getBudget() {
        return $this->hasOne(Budget::className(), ['id'=>'budget_id']);
    }
}
