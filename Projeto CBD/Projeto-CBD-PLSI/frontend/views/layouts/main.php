<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title>Flying Turkey</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo.css">
    <link rel="stylesheet" href="css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="css/fontawesome.min.css">
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="logo align-self-center" href="index.php">
                <img src="img/logo.png" height="100px">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::toRoute('site/index') ?>">Página Inicial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::toRoute('produto/index') ?>">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::toRoute('site/about') ?>">Sobre Nós</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= Url::toRoute('site/contact') ?>">Contactos</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <?php 
                    if (!Yii::$app->user->isGuest) { ?>
                    <a class="nav-icon position-relative text-decoration-none" href="<?= Url::toRoute('dadospessoais/index') ?>">
                        <i class="fa fa-fw fa-user text-dark mr-1"></i>
                    <a class="nav-icon position-relative text-decoration-none" href="<?= Url::toRoute('desejos/index') ?>">
                        <i class="fa fa-heart"></i>
                    </a>
                    
                    <a class="nav-icon position-relative text-decoration-none" href="<?= Url::toRoute('carrinho/index') ?>">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    </a>
                    <?php }?>
                    

                    <?php 
                    if (Yii::$app->user->isGuest) { ?>
                        <a class="nav-icon position-relative text-decoration-none" href="<?= Url::toRoute('site/login') ?>">
                            <i class="fa fa-fw fa-user text-dark mr-3" style="font-size:20px"></i>
                        </a>
                    <?php 
                   } else {
                    echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                            . Html::submitButton( 
                                '<i class="fas fa-sign-out-alt text-dark mr-3" style="font-size:20px"></i>',
                                ['class' => 'btn btn-link logout text-decoration-none']
                                
                            )
                            . Html::endForm();
                            
                            
                    }
                    
                    ?>
                    
                    <!--continuar aqui-->
                </div>
            </div>

        </div>
    </nav>
</header>

<main role="main" class="flex-shrink-0">
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
    
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="bg-dark" id="tempaltemo_footer">
<div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Flying Turkey</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            <a class="text-decoration-none">Rua do pisão 12</a>
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none">212535432</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none">geral@flyingturkey.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Produtos</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">placeholder</a></li>
                        <li><a class="text-decoration-none" href="#">placeholder</a></li>
                        <li><a class="text-decoration-none" href="#">placeholder</a></li>
                        <li><a class="text-decoration-none" href="#">placeholder</a></li>
                        <li><a class="text-decoration-none" href="#">placeholder</a></li>
                        <li><a class="text-decoration-none" href="#">placeholder</a></li>
                        <li><a class="text-decoration-none" href="#">placeholder</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Mais informação</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="<?= Url::toRoute('site/contact') ?>">Contactos</a></li>
                        <li><a class="text-decoration-none" href="<?= Url::toRoute('site/about') ?>">Sobre Nós</a></li>
                    </ul>
                </div>
            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2022 CBD
                        </p>
                    </div>
                </div>
            </div>
        </div>
</footer>

    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/templatemo.js"></script>
    <script src="js/custom.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
