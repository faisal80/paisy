<?php

namespace backend\controllers;

use Yii;
use common\models\Trx;
use common\models\Trxdetail;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Model;

/**
 * TrxController implements the CRUD actions for Trx model.
 */
class TrxController extends Controller
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
     * Lists all Trx models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Trx::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trx model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $trx = $this->findModel($id);
        $trxdetail = new ActiveDataProvider([
            'query' => $trx->getTrxdetail(),
        ]);
        
        return $this->render('view', [
            'trx' => $trx,
            'trxdetail' => $trxdetail,
        ]);
    }

    /**
     * Creates a new Trx model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
//        $model = new Trx();
        $trxModel = new Trx();
        $trxdetailModels = [new Trxdetail];

        if ($trxModel->load(Yii::$app->request->post())) {
        
            $trxdetailModels = Model::createMultiple(Trxdetail::className());
            Model::loadMultiple($trxdetailModels, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($trxdetailModels),
                    ActiveForm::validate($trxModel)
                );
            }

            // validate all models
            $valid = $trxModel->validate();
            $valid = Model::validateMultiple($trxdetailModels) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $trxModel->save(false)) {
                        foreach ($trxdetailModels as $trxdetailModel) {
                            $trxdetailModel->trx_id = $trxModel->id;

                            if (($flag = $trxdetailModel->save(false)) === false) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $trxModel->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'trxModel' => $trxModel,
            'trxdetailModels' => (empty($trxdetailModels)) ? [new Trxdetail] : $trxdetailModels
        ]);
    }

    /**
     * Updates an existing Trx model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $trxModel = $this->findModel($id);
        $trxdetailModels = $trxModel->trxdetail;

        if ($trxModel->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($trxdetailModels, 'id', 'id');
            $trxdetailModels = Model::createMultiple(Trxdetail::classname(), $trxdetailModels);
            Model::loadMultiple($trxdetailModels, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($trxdetailModels, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($trxdetailModels),
                    ActiveForm::validate($trxModel)
                );
            }

            // validate all models
            $valid = $trxModel->validate();
            $valid = Model::validateMultiple($trxdetailModels) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $trxModel->save(false)) {

                        if (!empty($deletedIDs)) {
                            $flag = Trxdetail::deleteByIDs($deletedIDs);
                        }

                        if ($flag) {
                            foreach ($trxdetailModels as $trxdetailModel) {
                                $trxdetailModel->trx_id = $trxModel->id;
                                if (($flag = $trxdetailModel->save(false)) === false) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $trxModel->id]);
                    }

                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'trxModel' => $trxModel,
            'trxdetailModels' => (empty($trxdetailModels)) ? [new Trxdetail] : $trxdetailModels
        ]);
    }

    /**
     * Deletes an existing Trx model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Trx model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Trx the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trx::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
