<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contactos';
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><p></p></p><br>

    <h3>Contactos informativos</h3>
    <br>
    <p>Email: geral@flyingturkey.com</p>
    <p>Telefone: 212535432</p>

    <p><p></p></p><br>

    <h3>Contactos suporte</h3>
    <br>
    <p>Email: Suporte@flyingturkey.com</p>
    <p>Telefone: 272857909</p>
    
    <p><p></p></p><br>

    <h3>Contactos administrativos</h3>
    <br>
    <p>Email: administrativos@flyingturkey.com</p>
    <br><br>

</div>
