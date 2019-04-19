<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model yii\data\ActiveDataProvider */

$this->title = "Pay Scale: " . $model->wef;

?>

<section class="invoice">
        
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-th-list"></i> Pay Scale Chart w.e.f <?php echo $model->ps ?>
            </h2>
        </div>
        <!-- /.col -->
    </div>
    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover" sytle="font-stretch:condensed">
                <thead>
                <tr>
                    <th>BPS</th>
                    <?php 
                       $stages = ($model->bpsDetail[0]->maximum - $model->bpsDetail[0]->minimum) / $model->bpsDetail[0]->increment;
                       for ($i=0;$i<=$stages;$i++) {
                           echo '<th style="text-align:center">' . $i . '</th>';
                       }
                    ?>
                </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($model->bpsDetail as $bpsDetail) {
                            echo '<tr><td class="success">'.$bpsDetail->bps . '</td>';
                            $pay = $bpsDetail->minimum;
                            $stages = ($bpsDetail->maximum - $bpsDetail->minimum) / $bpsDetail->increment;
                            for ($i=0;$i<=$stages;$i++) {
                                echo '<td style="text-align:right" '.($i%2?'class="info"':"").'>'. $pay . '</td>';
                                $pay += $bpsDetail->increment;
                            }
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
</section>
