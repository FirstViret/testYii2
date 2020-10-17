<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Login';
?>
<div class="site-login">
    <div class="row" style="display: flex;justify-content: center;">
        <div class="col-lg-6"><h1 class="text-center"><?= Html::encode($this->title) ?></h1></div>
    </div>
    <div class="row" style="display: flex;justify-content: center;">
        <div class="col-lg-4">
            <h4 class="text-danger text-center"><?= $model->errors['user_error'][0] ?></h4>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'Enter username']) ?>
            <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Enter password']) ?>
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
            <div class="form-group" style="display: flex;justify-content: center;">
                <a style="margin-right: auto;" href="<?= \yii\helpers\Url::to(['auth/registration']) ?>"
                   class=" btn btn-lg btn-info"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Registration</a>
                <?= Html::submitButton('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Login', ['class' => 'btn btn-lg btn-success', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
