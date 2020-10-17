<?php

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = $name;
?>
<div class="site-error text-center">
    <div class="row" style="display: flex;justify-content: center">
        <div class="col-lg-6">
            <h1><?= Html::encode($this->title) ?></h1>
            <div class="alert alert-danger">
                <?= nl2br(Html::encode($message)) ?>
            </div>
            <p>
                <a style="margin-right: auto;" href="<?= Url::home() ?>" class="btn btn-lg btn-success"> Go to Home</a>
            </p>
        </div>
    </div>
</div>
