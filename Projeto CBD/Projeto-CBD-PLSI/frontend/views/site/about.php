<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;



?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    
</div>
<html lang="en">
    <section class="bg-success py-5">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-8 text-white">
                    <h1>Sobre Nós</h1>
                    <p>
                        <p>Um negócio inovador em Portugal.<br>
                        Completamente legal.<br>
                        Com a ambição de trazer os produtos mais recentes aos nossos clientes.
                        </p>
                       
                    </p>
                </div>
                <div class="col-md-4">
                    <a class="logo align-self-left">
                        <img src="img/sobrenos-img.png" height="400px">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Os Nossos Serviços</h1>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
                    <h2 class="h5 mt-4 text-center">Serviços de Envio</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-seedling"></i></div>
                    <h2 class="h5 mt-4 text-center">Produtos Organicos</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-credit-card"></i></div>
                    <h2 class="h5 mt-4 text-center">Vários Metodos de Pagamento</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-thumbs-up"></i></div>
                    <h2 class="h5 mt-4 text-center">Produtos de Qualidade</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>