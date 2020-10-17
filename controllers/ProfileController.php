<?php


namespace app\controllers;

use app\models\Profile;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index', 'up-counter'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $user = User::findOne(Yii::$app->user->identity->id);
        return $this->render('index', ['counter' => $user->profile->counter]);
    }

    public function actionUpCounter()
    {
        $user = User::findOne(['id' => Yii::$app->user->identity->id]);
        $profile = Profile::findOne($user->profile->id);
        $profile->counter = $user->profile->counter + 1;
        $profile->save();
        return $this->goBack();
    }
}