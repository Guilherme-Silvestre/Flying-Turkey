<?php

use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \common\models\Dadospessoais */

$this->title = 'My Yii Application';
?>
   <br>
<?php
if (empty($encomendas)){
    echo '<h5>Não existem encomendas</h5>';
} else {
    ?>
        <?php
        foreach ($encomendas as $encomenda) {
            ?>
            <h3>Morada de Entrega: <?= $encomenda->moradaEntrega ?></h3>
            <h4>Morada de Faturação: <?= $encomenda->moradaFaturacao ?></h4>
            <h4 style="color: green">Data: <?= $encomenda->dtaEmissao ?> | Estado: <?= $encomenda->estado ?></h4>
            <h4>Pago: <?= $encomenda->pago ? 'Sim' : 'Não' ?></h4>
            <br>
            <?php
                foreach ($encomenda->linhafaturas as $linhafatura) {
            ?>
                <div class="row">
                    <div class="col-2">
                        <?= Html::img('@pathimagem' .'/' . $linhafatura->produto->imagems[0]->nome, ['width' => '100%']) ?>
                    </div>
                    <div class="col-9">
                        <p><?= $linhafatura->produto->nome ?></p>
                        <p><?= $linhafatura->produto->preco ?>€</p>
                        <p>Quantidade: <?= $linhafatura->qnt ?></p>
                        <br>
                        <p style="color:green"><?= $linhafatura->produto->preco * $linhafatura->qnt?>€</p>
                    </div>
                </div>
                    <br>
            <?php
                }
            ?>
            <br>
            <br>
            <?php
        }
        ?>
<?php
}
?>
