<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <label for="Roles">Roles</label>
    <select name="roles" id="Roles" class="">
        <?php
        $roles = Yii::$app->authManager->getRoles();
        foreach($roles as $role){
        ?>
            <option value="<?= $role->name ?>" <?= $model->getRole()==$role->name ? "selected":"" ?>><?= $role->name ?></option>
        <?php
        }
        ?>
    </select>
  
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
