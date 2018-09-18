<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

foreach ($data as $value) {
    echo $value->element->code. '/'. 
            $value->majorObject->code.'/'.
            $value->minorObject->code.'/'.
            $value->code . '<br>';

}