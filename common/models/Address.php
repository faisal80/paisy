<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property string $address
 * @property string $city
 * @property string $contact_number
 * @property int $employee_id
 * @property string $address_type
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_by
 * @property int $updated_at
 */
class Address extends \common\models\MyActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['address'], 'string', 'max' => 255],
            [['city'], 'string', 'max' => 25],
            [['contact_number'], 'string', 'max' => 100],
            [['address_type'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'city' => 'City',
            'contact_number' => 'Contact Number',
            'employee_id' => 'Employee',
            'address_type' => 'Address Type',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
    
    public function getEmployee() { 
       return $this->hasOne(Employee::className(),['id'=>'employee_id']); 
    } 
}
