<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Produto $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Produto', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Adicionar Imagem', ['updateimg', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <table class="table">
        <tbody> 
            <tr>
    <?php
        $imagens = $model->imagems;
        foreach($imagens as $imagem)
        {
         ?>
                <td>
                    <?=Html::img(Yii::getAlias('@pathimagem') . '/' . $imagem->nome, ['style'=>'max-width: 250px; max-height: 250px'])?>
                    <?= Html::a('Remover Imagem', ['deleteimg', 'id' => $imagem->id], ['class' => 'btn btn-danger'])?>
                </td>
    <?php       
        }
        ?>
            </tr>
        </tbody>
    </table>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'descricao',
            'preco',
            'stock',
            'categoria_id',
        ],
    ]) ?>

</div>
