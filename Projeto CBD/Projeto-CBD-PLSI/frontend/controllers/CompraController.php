<?php

namespace frontend\controllers;

use common\models\Carrinho;
use common\models\Dadospessoais;
use common\models\Fatura;
use common\models\Linhafatura;
use frontend\models\PagamentoCartao;
use Yii;
use yii\web\Controller;
use function Psr\Log\alert;

class CompraController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dadospessoais = Dadospessoais::findOne(['user_id' => Yii::$app->user->id]);


           return $this->render('index', [
                'model' => $dadospessoais,

            ]);
        }
    public function actionFaturacompra()
    {
        $dadospessoais = Dadospessoais::findOne(['user_id' => Yii::$app->user->id]);
        $pagamento = new PagamentoCartao();

        $produtosCarrinho = Carrinho::find()->where(['dadospessoais_id'=> $dadospessoais->id])->all();
        $precototal = 0;

        foreach ($produtosCarrinho as $carrinho)
        {
            $precototal += $carrinho->produto->preco * $carrinho->quant;
        }


        return $this->render('faturacompra',['model' =>  $dadospessoais,'precototal'=>$precototal,'pagamento'=>$pagamento]);
    }
    public function actionCompra()
    {
        $dadospessoais = Dadospessoais::findOne(['user_id' => Yii::$app->user->id]);
        $novafatura = new Fatura();


        if($_POST['Entrega'] == 'levantarloja')
        {
            $novafatura->moradaEntrega = $_POST['Entrega'];
            $novafatura->pago = 0;
            $novafatura->estado = 'levantar';
        }
        else
        {


            $novafatura->moradaEntrega = $_POST['Dadospessoais']['morada'];
            $novafatura->pago = 1;
            $novafatura->estado = 'transito';
        }
            $novafatura->moradaFaturacao = $dadospessoais->morada;
            $novafatura->dtaEmissao =  date("Y-m-d H:i:s");
            $novafatura->dadospessoais_id = $dadospessoais->id;

            $novafatura->save();

            $produtosCarrinho = Carrinho::find()->where(['dadospessoais_id'=> $dadospessoais->id])->all();

            foreach ($produtosCarrinho as $produto)
            {
                /* @var $produto Carrinho */
                $novalinhafatura = new Linhafatura();

                $novalinhafatura->qnt = $produto->quant;
                $novalinhafatura->precoProduto = $produto->produto->preco;
                $novalinhafatura->produto_id = $produto->produto_id;
                $novalinhafatura->fatura_id = $novafatura->id;

                $novalinhafatura->save();
                $produto->delete();
            }

            Yii::$app->session->setFlash("success","A compra foi feita com sucesso!");
            return $this->redirect(['/site/index']);
    }

}

