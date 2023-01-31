<?php

/** @var yii\web\View $this */

use yii\helpers\Url;


$this->title = 'My Yii Application';
?>
<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="img/img_carousel.png">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Flying</b> Turkey</h1>
                                <h3 class="h2">Levante voo sem sair de casa</h3>
                                <p>
                                    Somos uma loja de canabidiol onde o nosso foco principal é o conforto do cliente. Usufrua dos nossos serviços e receba a sua encomenda em casa dentro de 3 dias uteis!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="img/img_carousel2.png">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">TERPSMATTER CBG</h1>
                                <p>
                                Como seu cheiro, o sabor desta variedade tem uma forte base terrosa, mas um final doce e aveludado, que remetem 
                                a morangos, com notas frutadas e amanteigadas.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="img/imagem3.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">STÜNDENGLASS METAL GRAVITY HOOKAH</h1>
                                <p>
                                A Stündenglass tem a honra de apresentar o Gravity Hookah, um cachimbo de água de vidro giratório de 360 ​​° sofisticado e elegantemente projetado que gera ativação de movimento cinético por meio de deslocamento de água em cascata, opondo-se à tecnologia de fluxo de ar e à força natural da gravidade.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Artigos em destaque</h1>
                <p>
                    Os produtos que te levam mais alto
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <img src="../web/img/img_destaque.png" class="rounded-circle img-fluid border">
                <h5 class="text-center mt-3 mb-3">MANGO KUSH</h5>
                <p class="text-center"><a class="btn btn-success" href="<?= Url::toRoute('produto/index') ?>">Ver produtos</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <img src="../web/img/img_destaque2.png" class="rounded-circle img-fluid border">
                <h2 class="h5 text-center mt-3 mb-3">ÓLEO DE CBD 1000MG,10% - REAKIRO</h2>
                <p class="text-center"><a class="btn btn-success" href="<?= Url::toRoute('produto/index') ?>">Ver produtos</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <img src="../web/img/img_destaque3.png" class="rounded-circle img-fluid border">
                <h2 class="h5 text-center mt-3 mb-3">BANDEJA RAW CLASSIC</h2>
                <p class="text-center"><a class="btn btn-success" href="<?= Url::toRoute('produto/index') ?>">Ver produtos</a></p>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Novidades</h1>
                    <p>
                        Os nossos produtos acabados de aterrar
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="<?= Url::toRoute('produto/index') ?>">
                            <img src="../web/img/img_novidades.png" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="text-muted text-right">$22.00</li>
                            </ul>
                            <a href="<?= Url::toRoute('produto/index') ?>" class="h2 text-decoration-none text-dark">HASH CBD 40% BUBBLE ICE - 2G</a>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="<?= Url::toRoute('produto/index') ?>">
                            <img src="../web/img/img_novidades2.jpeg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">

                                <li class="text-muted text-right">$25.00</li>
                            </ul>
                            <a href="<?= Url::toRoute('produto/index') ?>" class="h2 text-decoration-none text-dark">TERPSMATTER CBG - 2G</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="<?= Url::toRoute('produto/index') ?>">
                            <img src="../web/img/img_novidades3.png" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="text-muted text-right">$22.00</li>
                            </ul>
                            <a href="<?= Url::toRoute('produto/index') ?>" class="h2 text-decoration-none text-dark">HASH CBD 20% SUPER DRY - 2G</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->
