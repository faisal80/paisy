<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bps".
 *
 * @property int $id
 * @property string $wef
 * @property string $reference_no
 * @property string $date
 * @property string $department Description
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class Bps extends \common\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bps';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wef', 'date'], 'safe'],
            [['created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['reference_no'], 'string', 'max' => 150],
            [['department'], 'string', 'max' => 255 ],            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wef' => 'W.E.F',
            'reference_no' => 'Reference No',
            'date' => 'Date',
            'department' => 'Department',
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
        $this->fixDate($this, 'wef');
        $this->fixDate($this, 'date');
        
        return true;
    }    
    
    public function afterFind() {
        parent::afterFind();
        
        $this->fixDate($this, 'wef', false);
        $this->fixDate($this, 'date', false);
    }
    
    public function getPs()  {
        return $this->wef . ' (' . $this->department .')';
    }
    
    /**
     * return an array of Basic Pay Scales for Dropdownlist
     */
    public function getAll() {
        $result = Bps::find()->orderBy('wef')->all();
        return \yii\helpers\ArrayHelper::map($result, 'id', 'ps');
    }
    
    /**
     * return all children bpsDetail
     */
    public function getBpsDetail() {
        return $this->hasMany(BpsDetail::className(), ['bps_id'=>'id']);
    }
    
}
