<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

            // validate all models
            $valid = $trxModel->validate();
            $valid = Model::validateMultiple($trxdetailModels) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $trxModel->save(false)) {
                        foreach ($trxdetailModels as $trxdetailModel) {
                            $trxdetailModel->trx_id = $trxModel->id;
                            if (! ($flag = $trxdetailModel->save(false))) {
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
            'trxdetailModels'=> (empty($trxdetailModels)) ? [new Trxdetail()] : $trxdetailModels,
        ]);