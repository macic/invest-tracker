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

        if ($holder->load(Yii::$app->request->post()) && $holder->save()) {
            return $this->redirect(['/account/create']);

        }
    }


}
