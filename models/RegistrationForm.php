<?php


namespace app\models;

use DateTime;
use yii\base\Model;

class RegistrationForm extends Model
{
    public
        $username,
        $birthday,
        $password;

    public function rules()
    {
        return
            [
                [['username', 'password', 'birthday'], 'required'],
                ['username', 'trim'],
                ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username already exists!'],
                ['username', 'string', 'min' => 2, 'max' => 255],
                ['password', 'string', 'min' => 6],
                ['birthday', 'validationBirthday'],
            ];
    }

    public function validationBirthday($attribute, $params)
    {
        $date = new DateTime($this->birthday);
        $dateInterval=$date->diff(new DateTime(date("d.m.Y")));
        $amountAge = $dateInterval->format("%Y");
        $amountAge = intval($amountAge);
        if($amountAge<5)
        {
            $this->addError('user_error', 'Too young!');
            return false;
        }
        if($amountAge>150)
        {
            $this->addError('user_error', 'Too old!');
            return false;
        }

    }
    public function registration()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->birthday = DateTime::createFromFormat('d.m.Y',$this->birthday)->format('Y-m-d');
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save();
        $profile = new Profile();
        $profile->counter = 0;
        $profile->user_id = $user->getId();
        return $profile->save();
    }
}