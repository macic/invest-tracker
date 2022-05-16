<?php

namespace app\controllers;

use app\models\AccountHolder;
use Yii;
use yii\base\BaseObject;

class AccountHolderController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionCreate() {

        $holder = new AccountHolder();
        $postData = Yii::$app->request->post();
        $postData["AccountHolder"]["user_id"] = Yii::$app->user->getId();

        if ($holder->load($postData) && $holder->save()) {
            return $this->redirect(['/account/create']);
        }
    }
}
