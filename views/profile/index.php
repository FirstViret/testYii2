<?php
use yii\helpers\Html;
$this->title = 'Counter';
?>
<div class="site-index">

    <div class="row text-center" style="display: flex;justify-content: center;">
        <div class="col-lg-6">
            <h3 class=""><?= Html::encode($this->title) ?></h3>
            <h1 style="font-size: 10rem"><?= $counter; ?></h1>
        </div>
    </div>
    <div class="row" style="display: flex;justify-content: center;">
        <div class="col-lg-4">
            <div class="form-group" style="display: flex;justify-content: center;">
                <?=
                Html::beginForm(['profile/up-counter'], 'post',['style'=>"margin-right: 10%;"]),
                Html::submitButton('+ 1', ['class' => 'btn btn-lg btn-info']),
                Html::endForm(),
                Html::beginForm(['auth/logout'], 'post'),
                Html::submitButton('Выход', ['class' => 'btn btn-lg btn-danger']),
                Html::endForm();
                ?>
              </div>
        </div>
    </div>
</div>