<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bps_detail".
 *
 * @property int $id
 * @property int $bps_id
 * @property int $bps
 * @property int $minimum
 * @property int $increment
 * @property int $maximum
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class BpsDetail extends \common\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bps_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bps_id', 'bps', 'minimum', 'increment', 'maximum', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bps_id' => 'Basic Pay Scale',
            'bps' => 'BPS',
            'minimum' => 'Minimum',
            'increment' => 'Increment',
            'maximum' => 'Maximum',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
    
    public function getPayScale() {
        return $this->hasOne(Bps::className(),['id'=>'bps_id']);
    }
}
