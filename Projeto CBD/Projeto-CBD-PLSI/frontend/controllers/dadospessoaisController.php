<?php

namespace frontend\controllers;

use common\models\Dadospessoais;
use common\models\Fatura;
use Yii;
use yii\web\Controller;

class DadospessoaisController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dadospessoais = Dadospessoais::findOne(['user_id' => Yii::$app->user->id]);
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            if($this->request->isPost){
                $dadospessoais->load($this->request->post());
                if($dadospessoais->save()){
                    Yii::$app->session->setFlash('success', "Perfil alterado com sucesso");
                }
                else{
                    Yii::$app->session->setFlash('error', "Não foi possivel alterar o Perfil com sucesso");
                }
            }

            return $this->render('index', [
                'model' => $dadospessoais,
            ]);
        }
    }
    public function actionEncomendas()
    {
        $dadospessoais = Dadospessoais::findOne(['user_id' => Yii::$app->user->id]);

        $encomendas = Fatura::find()->where(['dadospessoais_id' => $dadospessoais->id])->orderBy('dtaEmissao DESC')->all();

        return $this->render('encomendas',[
            'encomendas' => $encomendas,
        ]);
    }

}
