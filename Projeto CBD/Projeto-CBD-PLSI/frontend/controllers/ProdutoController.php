<?php

namespace frontend\controllers;

use common\models\Produto;

class ProdutoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $produtos = Produto::find()->all();

        return $this->render('index',['produtos'=>$produtos]);
    }
    public function actionDetalhes($id)
    {
        $produto = Produto::find()->where(['id' => $id])->one();

        return $this->render('detalhes',['produto'=>$produto]);
    }
    
}
