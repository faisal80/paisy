<?php

//use yii\helpers\Html;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->title = 'Entities';

//var_dump($data);
//echo '<pre>';
//print_r($data);
//echo '</pre>';

    function printList($data) {
        echo '<ul>';
        foreach ($data as $element) {
            if (is_object($element)) {
                echo '<li>'. $element->entity_name . '</li>';
            } else {
                printList($element);
            }
        }
        echo '</ul>';
    }

?>

<section class="invoice">
    
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-book"></i> Entities
                <small class="pull-right">Date: <?= date(Yii::$app->user->identity->date_format) ?></small>
            </h2>
        </div>
        <!-- /.col -->
    </div>
    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <?php
            printList($data);
            
            ?>
               
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    
</section>
