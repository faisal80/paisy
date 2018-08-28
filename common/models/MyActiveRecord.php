<?php

namespace common\models;

use Yii;
use yii\db;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class MyActiveRecord extends \yii\db\ActiveRecord
{
    
    /**
     * Adds common behaviors to model
     */	
    public function behaviors() {
        
        parent::behaviors();
        
        return [
            // adds timestamp values to created_at and updated_at fields
            TimestampBehavior::className(),
            
            // adds current user ID to created_by and updated_by fields
            BlameableBehavior::className(),

        ];
    }

    
    /**
     * Validates Date
     * @param type $attribute
     * @param type $params
     */
    public function validate_date($attribute,$params)
    {
        $ds = $params[0];
        $sDate = str_replace($ds, '-', $this->getAttribute($attribute));
        if (preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $sDate, $xadBits))
            if (checkdate($xadBits[1], $xadBits[2], $xadBits[3]))
                $this->addError($attribute,'Incorrect date.');
    }

    /**
     * This method sets the date as per DB requirement or the App requirement
     */
    protected function fixDate(&$model, $attribute, $forDB=true)
    {
        $ds = substr(Yii::$app->user->identity->date_format, 1, 1);
        if ($forDB) // Set for DB
        {
            if ($model->getAttribute($attribute)<>'')
            {
                list($d, $m, $y) = explode($ds, $model->getAttribute($attribute));
                $mk=mktime(0, 0, 0, $m, $d, $y);
                $model->setAttribute($attribute, date('Y-m-d', $mk));
                return true;
            }
        } else {	// Set for App
            if ($model->getAttribute($attribute)<>'')
            {
                list($y, $m, $d) = explode('-', $model->getAttribute($attribute));
                $mk=mktime(0, 0, 0, (int)$m, (int)$d, (int)$y);
                $model->setAttribute($attribute, date(Yii::$app->user->identity->date_format, $mk));
                return true;
            }
        }
        return false;		
    }

    /**
     * Setting relation with user table to get username of creator
     */
    public function getCreatedby()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    
    /**
     * Setting relation with user table to get username of creator
     */
    public function getUpdatedby()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
    
}
