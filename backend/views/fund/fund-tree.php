<?php


$this->title = 'Funds';



    function printList($data) {
        echo '<ul>';
        foreach ($data as $element) {
            if (is_object($element)) {
                echo '<li>'. $element->fund_name . '</li>';
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
                <i class="fa fa-book"></i> Funds
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
