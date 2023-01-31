<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;

?>
 <?php $form = ActiveForm::begin([
    'action' => ['carrinho/atualizar']
 ]); ?>

<div class="container py-5">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                </div>
            </div>
                <div class="row">
                    <?php foreach($produtosCarrinho as $carrinho){ ?>
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <!-- <img class="card-img rounded-0 img-fluid" src="assets/img/shop_01.jpg">-->
                                <?= Html::img('@pathimagem' .'/' . $carrinho->produto->imagems[0]->nome) ?> 
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li>
                                            <?=Html::a('<i class="fa fa-trash"> Remover</i>',["carrinho/delete_produto",'id'=>$carrinho->produto->id],["class"=>"btn btn-danger text-white"]) ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <?=Html::a($carrinho->produto->nome,["produto/detalhes",'id'=>$carrinho->produto->id],["class"=>"h3 text-decoration-none","style"=>"color:green"]) ?>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li><?= $carrinho->produto->categoria->nome ?></li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <input type="number" id="quantidade" class=" single-input" min="1"
                                        name="<?= $carrinho->produto->id ?>[quantidade]"
                                        value="<?= $carrinho->quant ?>">
                                </ul>
                                <p class="text-center mb-0" style="color:green"><?= $carrinho->produto->preco * $carrinho->quant?>€</p>
                            </div>
                        </div>
                    </div>
                  
                    <?php } ?> 
                    <div class="form-group text-center">
                        <a href="<?= Url::toRoute('compra/index') ?>" class="btn btn-success text-white" onclick="goStep2()">Comprar</a>
                        <?= Html::submitButton('Atualizar Carrinho', ['class' => 'btn btn-primary', 'name' => 'update-button']) ?>
                    </div>
 <?php ActiveForm::end(); ?>