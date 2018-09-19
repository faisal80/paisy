<?php

//use yii\helpers\Html;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->title = 'Chart of Accounts';

//var_dump($data);
//echo '<pre>';
//print_r($data);
//echo '</pre>';

    function printList($data) {
        echo '<ul>';
        foreach ($data as $element) {
            if (is_object($element)) {
                echo '<li>'. $element->headofaccount . '</li>';
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
                <i class="fa fa-book"></i> Chart of Accounts
                <small class="pull-right">Date: <?= date(Yii::$app->user->identity->date_format) ?></small>
            </h2>
        </div>
        <!-- /.col -->
    </div>
    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
<!--            <table class="table table-striped table-condensed">
                <thead>
                <tr>
                    <th>Element</th>
                    <th>Major Object</th>
                    <th>Minor Object</th>
                    <th>Detailed Object</th>
                </tr>
                </thead>
                <tbody>-->
                <?php 
//                foreach($data as $element) { 
//                    if (is_object($element)) {
//                        echo '<tr><td>'. $element->headofaccount. '</td>';
//                        echo '<td></td><td></td><td></td>';
//                    } else {
//                        foreach ($element as $index=>$major) {
//                            if (is_object($major)) {
//                                echo ($index==0 ? '<td></td>' : '');
//                                echo '</tr><tr><td></td>';
//                                echo '<td>'. $major->headofaccount .'</td>';
//                                echo '<td></td><td></td></tr>';
//                            } else {
//                                foreach ($major as $minor) {
//                                    if (is_object($minor)) {
//                                        echo '<tr><td></td><td></td>';
//                                        echo '<td>'. $minor->headofaccount .'</td>';
//                                        echo '<td></td></tr>';
//                                    } else {
//                                        foreach ($minor as $detailed) {
//                                            if (is_object($detailed)) {
//                                                echo '<td></td><td></td><td></td>';
//                                                echo '<td>'. $detailed->headofaccount .'</td></tr>';
//                                            }
//                                        }
//                                    }
//                                }
//                            }
//                        }
//                    }
//                }
                ?>
<!--                </tbody>
            </table>-->

            <?php
            printList($data);
            
            ?>

                
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    
</section>
