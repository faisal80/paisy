<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $employee_name
 * @property string $nic
 * @property string $date_of_birth
 * @property string $domicile
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class Employee extends \common\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_of_birth'], 'safe'],
            [['created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['employee_name'], 'string', 'max' => 150],
            [['nic'], 'string', 'max' => 13],
            [['domicile'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_name' => 'Employee Name',
            'nic' => 'NIC',
            'date_of_birth' => 'Date of Birth',
            'domicile' => 'Domicile',
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
        $this->fixDate($this, 'date_of_birth');
        
        return true;
    }    
    
    public function afterFind() {
        parent::afterFind();
        
        $this->fixDate($this, 'date_of_birth', false);
    }
    
    public function getAll() {
        $result = Employee::find()->all();
        return \yii\helpers\ArrayHelper::map($result, 'id', 'employee_name');
    }
    
    public function getAddresses() {
        return $this->hasMany(Address::className(), ['employee_id'=>'id']);
    }
    
}
