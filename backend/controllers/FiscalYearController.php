<?php

namespace backend\controllers;

use Yii;
use common\models\FiscalYear;
use common\models\AccountingPeriod;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Migration;

/**
 * FiscalYearController implements the CRUD actions for FiscalYear model.
 */
class FiscalYearController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all FiscalYear models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => FiscalYear::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FiscalYear model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FiscalYear model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FiscalYear();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $mig = new Migration();
                $mig->createTable('trx'.$model->fiscal_year,[
                    'id'                   => $mig->primaryKey(),
                    'accounting_period_id' => $mig->integer(),
                    'description'          => $mig->string(),
                    'trx_date'             => $mig->date(),
                    'amount'               => $mig->bigInteger(),
                    'balanced'             => $mig->boolean(),
                    'entity_id'            => $mig->integer(),
                    'func_id'              => $mig->integer(),
                    'fund_id'              => $mig->integer(),
                    'created_by'           => $mig->integer(11),
                    'created_at'           => $mig->integer(11),
                    'updated_by'           => $mig->integer(11),
                    'updated_at'           => $mig->integer(11),
                    ]);
                
                $mig->createTable('trxdetail'.$model->fiscal_year,[
                    'id'         => $mig->primaryKey(),
                    'coa_id'     => $mig->integer(),
                    'trx_id'     => $mig->integer(),
                    'debit'      => $mig->bigInteger(),
                    'credit'     => $mig->bigInteger(),
                    'created_by' => $mig->integer(11),
                    'created_at' => $mig->integer(11),
                    'updated_by' => $mig->integer(11),
                    'updated_at' => $mig->integer(11),
                ]);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FiscalYear model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldValforfiscal_year = $model->fiscal_year;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->fiscal_year <> $oldValforfiscal_year) {
                $mig = new Migration();
                $mig->renameTable('trx'.$oldValforfiscal_year, 'trx'.$model->fiscal_year);
                $mig->renameTable('trxdetail'.$oldValforfiscal_year, 'trxdetail'.$model->fiscal_year);
            }            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FiscalYear model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        
        $mig = new Migration();
        $mig->dropTable('trx'.$model->fiscal_year);
        $mig->dropTable('trxdetail'.$model->fiscal_year);
        
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FiscalYear model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FiscalYear the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FiscalYear::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCreateAccountingPeriods($id) {
        
        $dateFormat = 'php:'. Yii::$app->user->identity->date_format;
        $yiiFormatter = Yii::$app->formatter;
        $sdate = $this->findModel($id)->fiscal_year . '-07-01';
        $edate = $this->findModel($id)->fiscal_year . '-07-31';
        for ($i = 1; $i < 13; $i++) {
            $accounting_period = new AccountingPeriod();
            $accounting_period->fiscal_year_id = $id;
            $accounting_period->period = $i;
            $accounting_period->start_date = $yiiFormatter->asDate($sdate, $dateFormat);
            $accounting_period->end_date = $yiiFormatter->asDate($edate, $dateFormat);
            $accounting_period->is_closed = false;
            $accounting_period->save();
            $sdate = date_create($yiiFormatter->asDate($sdate, 'yyyy-MM-dd'))->add(date_interval_create_from_date_string('P1M'));
            $edate = date_create($sdate->format('Y') .'-'. $sdate->format('m') .'-'. $sdate->format('t'));
        }
    }
    
}
