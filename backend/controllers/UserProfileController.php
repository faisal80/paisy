<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\User;

class UserProfileController extends \yii\web\Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'edit'],
                'rules' => [
                    [
                        'actions' => ['index', 'edit'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionEdit()
    {
        $model = User::findOne(Yii::$app->user->identity->id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    public function actionIndex()
    {
        $model = User::findOne(Yii::$app->user->identity->id);
        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
