<?php

use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \common\models\Dadospessoais */

$this->title = 'My Yii Application';
?>


<section class="section_padding">
    <div class="row">
        <div class="col-lg-3">
            <div class="left_sidebar_area">
                <aside class="left_widgets p_filter_widgets">
                    <div class="widgets_inner">
                        <ul class="list">
                            <li>
                                <a href="<?= Url::toRoute('dadospessoais/encomendas') ?>">Encomendas</a>
                            </li>
                        </ul>
                    </div>
                </aside>

                <aside class="left_widgets p_filter_widgets">
                    <div class="l_w_title">
                    </div>
                    <div class="widgets_inner">
                        <ul class="list">
                            <li>
                                <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                                    . Html::submitButton(
                                        'Logout',
                                        ['class' => 'btn btn-link logout text-decoration-none']
                                    )
                                    . Html::endForm() ?>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>

        <div class="col-lg-6">
            <h1 class="ls-text-primary">Perfil</h1>

            <?php $form = ActiveForm::begin(['id' => 'form-dadospessoais']); ?>
            <div class="form-group text-left">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" value="<?= $model->nome ?>" name="Dadospessoais[nome]" id="nome" disabled>
            </div>
            <div class="form-group text-left">
                <label for="endereco">Morada:</label>
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
                <a href="#" id="enableForm" onclick="enableForm()" class="btn btn-primary pr-5 pl-5">Editar</a>
            </div>
            <div class="form-group d-none" id="submit">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success pr-5 pl-5', 'id' => 'guardar']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

</section>

<script>
    function enableForm() {
        document.getElementById("nome").disabled = false;
        document.getElementById("morada").disabled = false;
        document.getElementById("codigoPostal").disabled = false;
        document.getElementById("nif").disabled = false;
        document.getElementById("dtaNasc").disabled = false;

        document.getElementById("enableForm").classList.add("d-none");
        document.getElementById("submit").classList.remove("d-none");
    }
</script>
<br>
