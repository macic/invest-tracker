<?php

namespace app\models;

use yii\helpers\VarDumper;

class SignupForm extends \yii\base\Model
{
    public $username;
    public $email;
    public $password;
    public $firstname;
    public $password_repeat;


    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password_repeat', 'firstname'], 'required'],
            [['username', 'email', 'password', 'password_repeat', 'firstname'], 'string', 'min' => 3, 'max' => 55],
            ['password_repeat', 'compare', 'compareAttribute' => 'password']
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password =  \Yii::$app->security->generatePasswordHash($this->password);
        $user->access_token = \Yii::$app->security->generateRandomString();
        $user->auth_key = \Yii::$app->security->generateRandomString();

        if($user->save()) {
            return $user->getPrimaryKey();
        }

        \Yii::error('User was not saved'. VarDumper::dumpAsString($user->errors));
        return false;

    }

}
