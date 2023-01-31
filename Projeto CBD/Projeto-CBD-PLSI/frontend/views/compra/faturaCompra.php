<?php


use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var $pagamento */
?>
    <br>
        <div class="col-lg-6">
            <h1 class="ls-text-primary">Dados de Entrega</h1>
            
            
            <?php $form = ActiveForm::begin(['action' => ['compra/compra']]); ?>


            <div class="form-group text-left">

                <input type="radio" id="levantarloja" name="Entrega" value="levantarloja" onchange="esconder()" checked>
                    <label for="levantarloja">Levantar em Loja</label><br>
                <input type="radio" id="entregarcasa" name="Entrega" value="entregarcasa" onchange="mostrar()">
                    <label for="entregarcasa">Entregar em Casa</label><br> 
                </div>

        <div id="casa">
            <div class="form-group text-left">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" value="<?= $model->nome ?>" name="Dadospessoais[nome]" id="nome" >
            </div>
            <div class="form-group text-left">
                <label for="endereco">Morada de Entrega:</label>
                <input type="text" class="form-control" value="<?= $model->morada ?>" name="Dadospessoais[morada]" id="morada" >
            </div>
            <div class="form-group text-left">
                <label for="codigoPostal">Código Postal:</label>
                <input  type="text" class="form-control" value="<?= $model->codigopostal ?>" name="Dadospessoais[codigopostal]" id="codigoPostal" >
            </div>
            <?= $form->field($model,'nif')->textInput(["maxlength"=>true,"type"=>"number","id"=>'nif']) ?>
            <div class="form-group text-left">
                <label for="endereco">Data de nascimento:</label>
                <input type="date" class="form-control" value="<?= $model->dtaNasc?>" name="DadosPessoais[dtaNasc]" id="dtaNasc" >
            </div>

                <br>
            <h3 class="ls-text-primary">Dados do Cartão Bancário</h3>
                <br>
            <?= $form->field($pagamento,'nomeproprietario')->textInput(["maxlength"=>true,"id"=>'proprietario']) ?>
                <br>
            <?= $form->field($pagamento,'numerocartao')->textInput(["maxlength"=>true,"type"=>'number',"id"=>'ncartao']) ?>
                <br>
            <?= $form->field($pagamento,'dtacartao')->textInput(["maxlength"=>true,"id"=>'dtacartao']) ?>
                <br>
            <?= $form->field($pagamento,'cartaoccv')->textInput(["maxlength"=>true,"id"=>'ccv']) ?>

        </div>
            <div class="form-group">
                <br>
                <p style="color:green">O Preço total da sua encomenda será: <?= $precototal ?>€</p>
                <?= Html::submitButton('Comprar', ['class' => 'btn btn-primary', 'name' => 'Comprar-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

</section>
<br>
<script>
    let casa = document.getElementById('casa');
    let levantarloja = document.getElementById('levantarloja');
    let entregarcasa = document.getElementById('entregarcas');
    let nome = document.getElementById('nome');
    let morada = document.getElementById('morada');
    let codPostal = document.getElementById('codigoPostal');
    let nif = document.getElementById('nif');
    let dtaNasc = document.getElementById('dtaNasc');
    let proprietario = document.getElementById('proprietario');
    let ncartao = document.getElementById('ncartao');
    let dtacartao = document.getElementById('dtacartao');
    let ccv = document.getElementById('ccv');


    casa.style.display="none";

    function esconder()
    {
        casa.style.display="none";

        nome.required = false;
        morada.required = false;
        codPostal.required = false;
        nif.required = false;
        dtaNasc.required = false;
        proprietario.required = false;
        ncartao.required = false;
        dtacartao.required = false;
        ccv.required = false;

    }
    function mostrar()
    {
            casa.style.display="block";

        nome.required = true;
        morada.required = true;
        codPostal.required = true;
        nif.required = true;
        dtaNasc.required = true;
        proprietario.required = true;
        ncartao.required = true;
        dtacartao.required = true;
        ccv.required = true;
    }

</script>