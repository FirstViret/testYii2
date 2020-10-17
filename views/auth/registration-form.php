<?php


use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registration';
?>
<div class="site-signup">
        <div class="row" style="display: flex;justify-content: center;">
            <div class="col-lg-6"><h1 class="text-center"><?= Html::encode($this->title) ?></h1></div>
        </div>
        <div class="row" style="display: flex;justify-content: center;">
            <div class="col-lg-4" >
                <h4 class="text-danger text-center"><?= $model->errors['user_error'][0] ?></h4>
                <?php $form = ActiveForm::begin(['id' => 'form-registration']); ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'Enter username'])?>
                <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Enter password']) ?>
                <?= $form->field($model, 'birthday')->widget(DatePicker::class,
                    [
                        'type' => DatePicker::TYPE_INPUT,
                        'options' => ['placeholder' => 'Enter birthday'],
                        'convertFormat' => true,
                        'pluginOptions' => [
                            'format' => 'dd.MM.yyyy',
                            'autoclose'=>true,
                            'weekStart'=>1,
                        ]
                    ]) ?>
                <div class="form-group" style="display: flex;justify-content: center;">
                    <a style="margin-right: auto;" href="<?=\yii\helpers\Url::to(['auth/login'])?>" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel</a>
                    <?= Html::submitButton('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Register', ['class' => 'btn btn-lg btn-success', 'name' => 'signup-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
</div>