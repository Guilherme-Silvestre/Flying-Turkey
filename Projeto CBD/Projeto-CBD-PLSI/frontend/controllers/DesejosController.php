<?php

namespace frontend\controllers;

use Yii;
use common\models\Produto;
use common\models\Dadospessoais;
use common\models\Listadesejo;



class DesejosController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dadospessoais = Dadospessoais::findOne(['user_id' => Yii::$app->user->id]);
        $produtosDesejos = Listadesejo::find()->where(['dadospessoais_id' => $dadospessoais->id])->all();

        return $this->render('index', ['produtosDesejos' => $produtosDesejos]);
    }

    public function actionAdicionar_desejos($id)
    {
        $dadospessoais = Dadospessoais::findOne(['user_id' => Yii::$app->user->id]);

        $dadosDesejos = Listadesejo::find()->where(['dadospessoais_id' => $dadospessoais->id])->andWhere(['produto_id' => $id])->one();

        if (!$dadosDesejos) {
            $dadosDesejos = new Listadesejo();
            $dadosDesejos->produto_id = $id;
            $dadosDesejos->dadosPessoais_id = $dadospessoais->id;


            $dadosDesejos->save();
            return $this->redirect(Yii::$app->request->referrer);
        }
        else
        {
            Yii::$app->session->setFlash("error",'O produto já se encontra na lista de desejos');
            return $this->redirect(Yii::$app->request->referrer);
        }
    }
    public function actionDelete_desejo($id)
    {
        $dadospessoais = Dadospessoais::findOne(['user_id' => Yii::$app->user->id]);
        $dadosDesejos = Listadesejo::find()->where(['dadospessoais_id'=> $dadospessoais->id])->andWhere(['produto_id'=>$id])->one();

        $dadosDesejos->delete();

        return $this->redirect(Yii::$app->request->referrer);
    }
}
