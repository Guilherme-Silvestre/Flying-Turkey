<?php

namespace frontend\controllers;

use Yii;
use common\models\Produto;
use common\models\Dadospessoais;
use common\models\Carrinho;

class CarrinhoController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $dadospessoais = Dadospessoais::findOne(['user_id' => Yii::$app->user->id]);
        $produtosCarrinho = Carrinho::find()->where(['dadospessoais_id'=> $dadospessoais->id])->all();

        return $this->render('index',['produtosCarrinho'=>$produtosCarrinho]);
    }

    public function actionAdicionar_carrinho($id)
    {
        /*$produtocarrinho = Produto::find()->where(['produto_id' => $id]);*/
        $dadospessoais = Dadospessoais::findOne(['user_id' => Yii::$app->user->id]);

        $dadoscarrinho = Carrinho::find()->where(['dadospessoais_id'=> $dadospessoais->id])->andWhere(['produto_id'=>$id]) -> one();

        if($dadoscarrinho)
        {
            $dadoscarrinho->quant +=1;
        }else
        {
            $dadoscarrinho = new Carrinho();
            $dadoscarrinho->produto_id = $id;
            $dadoscarrinho->dadosPessoais_id = $dadospessoais->id;
            $dadoscarrinho->quant = 1;
        }
        $dadoscarrinho->save();
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDelete_produto($id)
    { 
        $dadospessoais = Dadospessoais::findOne(['user_id' => Yii::$app->user->id]);
        $produtosCarrinho = Carrinho::find()->where(['dadospessoais_id'=> $dadospessoais->id])->andWhere(['produto_id'=>$id]) -> one() -> delete();;

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionAtualizar()
    {
        $dadospessoais = Dadospessoais::findOne(['user_id' => Yii::$app->user->id]);
        
       
        foreach($_POST as $key => $value)
        {
            
          if(is_numeric($key))
          {
            $dadoscarrinho = Carrinho::find()->where(['dadospessoais_id'=> $dadospessoais->id])->andWhere(['produto_id'=>$key]) -> one();

            $dadoscarrinho->quant = $_POST[$key]['quantidade'];
            $dadoscarrinho->save();
            
          }
        }
        return $this->redirect(Yii::$app->request->referrer);
    }
}
