<?php
/** @var yii\web\View $this */
use yii\helpers\Html;


?>

<div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Categorias
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Categoria1</a></li>
                            <li><a class="text-decoration-none" href="#">Categoria2</a></li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Preço
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseThree" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Bag</a></li>
                            <li><a class="text-decoration-none" href="#">Sweather</a></li>
                            <li><a class="text-decoration-none" href="#">Sunglass</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">

                <div class="row">
                    <?php foreach($produtos as $produto){ ?>
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <!-- <img class="card-img rounded-0 img-fluid" src="assets/img/shop_01.jpg">-->
                                <?= Html::img('@pathimagem' .'/' . $produto->imagems[0]->nome) ?> 
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li> <?=Html::a('<i class="far fa-heart"></i>',["desejos/adicionar_desejos",'id'=>$produto->id],["class"=>"btn btn-success text-white"]) ?>
                                        </li>
                                        <li> <?=Html::a('<i class="fas fa-cart-plus"></i>',["carrinho/adicionar_carrinho",'id'=>$produto->id],["class"=>"btn btn-success text-white mt-2"]) ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <?=Html::a($produto->nome,["produto/detalhes",'id'=>$produto->id],["class"=>"h3 text-decoration-none","style"=>"color:green"]) ?>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li><?= $produto->categoria->nome ?></li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                </ul>
                                <p class="text-center mb-0" style="color:green"><?= $produto->preco ?>€</p>
                            </div>
                        </div>
                      
                    </div>
                    <?php } ?>