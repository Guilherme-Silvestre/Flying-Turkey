<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;

?>


<div class="container py-5">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                </div>
            </div>
                <div class="row">
                    <?php foreach($produtosDesejos as $Listadesejo){ ?>
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <!-- <img class="card-img rounded-0 img-fluid" src="assets/img/shop_01.jpg">-->
                                <?= Html::img('@pathimagem' .'/' . $Listadesejo->produto->imagems[0]->nome) ?> 
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li>
                                            <?=Html::a('<i class="fa fa-trash"> Remover</i>',["desejos/delete_desejo",'id'=>$Listadesejo->produto->id],["class"=>"btn btn-danger text-white"]) ?>
                                        </li>
                                        <li>
                                            <?=Html::a('<i class="fas fa-cart-plus">Carrinho</i>',["carrinho/adicionar_carrinho",'id'=>$Listadesejo->produto->id],["class"=>"btn btn-success text-white mt-2"]) ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <?=Html::a($Listadesejo->produto->nome,["produto/detalhes",'id'=>$Listadesejo->produto->id],["class"=>"h3 text-decoration-none","style"=>"color:green"]) ?>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li><?= $Listadesejo->produto->categoria->nome ?></li>
                                </ul>
                                <p class="text-center mb-0" style="color:green"><?= $Listadesejo->produto->preco?>€</p>
                            </div>
                        </div>
                    </div>
                  
                    <?php } ?>