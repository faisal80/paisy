<?php

namespace common\behaviors;

use Yii;
use yii\base\Behavior;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class DateformatBehavior extends Behavior
{
    // Returns date format for this user
    public function getDateFormat($forJuiDatePicker=false)
    {
        if ($forJuiDatePicker)
        {
            if (Yii::$app->session['date_format'] == 'd.m.Y') {
                    return 'dd.mm.yy';
            } elseif (Yii::$app->session['date_format'] == 'd/m/Y') {
                    return 'dd/mm/yy';
            } elseif (Yii::$app->session['date_format'] == 'd-m-Y'){
                    return 'dd-mm-yy';
            }
        } else {
            if (Yii::$app->session['date_format'] == 'd.m.Y') {
                    return 'dd.MM.yyyy';
            } elseif (Yii::$app->session['date_format'] == 'd/m/Y') {
                    return 'dd/MM/yyyy';
            } elseif (Yii::$app->session['date_format'] == 'd-m-Y'){
                    return 'dd-MM-yyyy';
            }
        }
    }

    // Returns date separator for this user
    public function getDateSeparator()
    {
        return substr(Yii::$app->session['date_format'], 1, 1);
    }
}
