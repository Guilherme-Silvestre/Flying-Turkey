<?php
/** @var yii\web\View $this */

use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;
?>
    <br>
        <div class="col-lg-6">
            <h1 class="ls-text-primary">Dados de Faturação</h1>
            
            <?php $form = ActiveForm::begin(['id' => 'form-dadospessoais']); ?>
            <div class="form-group text-left">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" value="<?= $model->nome ?>" name="Dadospessoais[nome]" id="nome" disabled>
            </div>
            <div class="form-group text-left">
                <label for="endereco">Morada de Faturação:</label>
                <input type="text" class="form-control" value="<?= $model->morada ?>" name="Dadospessoais[morada]" id="morada" disabled>
            </div>
            <div class="form-group text-left">
                <label for="codigoPostal">Código Postal:</label>
                <input type="text" class="form-control" value="<?= $model->codigopostal ?>" name="Dadospessoais[codigopostal]" id="codigoPostal" disabled>
            </div>
            <div class="form-group text-left">
                <label for="nif">NIF:</label>
                <input type="number" class="form-control" value="<?= $model->nif ?>" name="Dadospessoais[nif]" id="nif" disabled>
            </div>
            <div class="form-group text-left">
                <label for="endereco">Data de nascimento:</label>
                <input type="date" class="form-control" value="<?= $model->dtaNasc?>" name="DadosPessoais[dtaNasc]" id="dtaNasc" disabled>
            </div>
            <br>
            <div class="form-group">
                <a href="<?= Url::toRoute('dadospessoais/index') ?>"  class="btn btn-primary pr-5 pl-5">Alterar dados</a>
                <a href="<?= Url::toRoute('compra/faturacompra') ?>" class="btn btn-success text-white" onclick="goStep2()">Avançar</a>
            </div>
            

            <?php ActiveForm::end(); ?>
        </div>

</section>
<br>
