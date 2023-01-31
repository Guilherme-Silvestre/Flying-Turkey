<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Fatura $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fatura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dtaEmissao')->textInput() ?>

    <?= $form->field($model, 'moradaEntrega')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'moradaFaturacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'entregue' => 'Entregue', 'levantar' => 'Levantar', 'transito' => 'Transito', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pago')->textInput() ?>

    <?= $form->field($model, 'dadospessoais_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
