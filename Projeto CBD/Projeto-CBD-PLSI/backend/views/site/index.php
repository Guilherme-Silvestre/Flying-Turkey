<?php
$this->title = 'Backend';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Número de utilizadores',
                'number' => '3',
                'icon' => 'far fa-user',
            ]) ?>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Número de funcionários',
                'number' => '1',
                'icon' => 'far fa-user',
            ]) ?>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Número de clientes',
                'number' => '1',
                'icon' => 'far fa-user',
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Número de produtos',
                'number' => '100',
                'icon' => '<ion-icon name="cube-outline"></ion-icon>',
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Encomendas em processamento',
                'number' => '0',
                'icon' => 'far fa-f',
            ]) ?>
        </div>
    </div>


</div>