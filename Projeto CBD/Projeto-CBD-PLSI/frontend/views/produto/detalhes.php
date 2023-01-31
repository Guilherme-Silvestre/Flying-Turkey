<?php
/** @var yii\web\View $this */
use yii\helpers\Html;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop - Product Detail Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
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



    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3" style="align-items:center">
                        <?= Html::img('@pathimagem' .'/' . $produto->imagems[0]->nome, ["class"=>"card-img img-fluid", "id"=>"product-detail", 'style'=>'max-width: 500px; max-height: 400px']) ?>

                    </div>
                    <div class="row">
                        <!--Start Controls-->
                      
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox" >
                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <?php foreach($produto->imagems as $imagem){ ?>
                                            <div class="col-4" style="max-width: 85px; max-height: 85px" >
                                                <a href="#">
                                                    <?= Html::img('@pathimagem' .'/' . $imagem->nome, ["class"=>"card-img img-fluid"]) ?>
                                                </a>
                                            </div>
                                         <?php } ?>
                                    </div>
                                </div>
                                <!--/.First slide-->
                            </div>
                           
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                  
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2"><?= $produto->nome ?></h1>
                            <p class="h3 py-2"><?= $produto->preco ?>$</p>
                
                            <h6>Descrição do Produto:</h6>
                            <p><?= $produto->descricao ?></p>
                            
                            <h6>Categoria:</h6>
                            <p><?= $produto->categoria->nome ?></p>
                            <form action="" method="GET">
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <?=Html::a('<i class="fas fa-cart-plus">Carrinho</i>',["carrinho/adicionar_carrinho",'id'=>$produto->id],["class"=>"btn btn-success text-white mt-2"]) ?>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->
    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>