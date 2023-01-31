<?php

use PhpParser\Node\Stmt\Foreach_;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
/** @var frontend\models\SignupForm $signup */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($signup, 'username')->textInput() ?>
    <?= $form->field($signup, 'email')->textInput() ?>
    <?= $form->field($signup, 'password')->passwordInput() ?>
    
    <label for="roles">Roles</label>
    <select name="roles" id="roles">
        <?php
            $roles = \Yii::$app->authManager->getRoles();
            foreach($roles as $role){
        ?>
            <option value="<?= $role->name ?>"><?= $role->name ?></option>
        <?php
            }
        ?>
    </select> 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
