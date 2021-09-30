<?php

namespace app\controllers;

use app\models\Account;
use Yii;
use app\models\Asset;
use app\models\AssetSearch;
use yii\base\BaseObject;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * AssetController implements the CRUD actions for Asset model.
 */
class AssetController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Asset models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssetSearch();
        $dataSearchProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataSearchProvider' => $dataSearchProvider,
        ]);
        $dataProvider = Asset::find()->all();

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single Asset model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Asset model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {

        $model = new Asset();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $accountsData = Account::find()->all();

        $formattedAccounts = array();
        foreach ($accountsData as $account) {
            $formattedAccounts[$account['id']] = strval($account['account_holder']) . ' - ' . strval($account['account_type']);
        }

        return $this->render('create', [
            'model' => $model,
            'accounts' => $accountsData,
            'formattedAccounts' => $formattedAccounts
        ]);
    }

    /**
     * Updates an existing Asset model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Asset model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Asset model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Asset the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Asset::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionListing($asset_type)
    {
        $items = Asset::find()->where(['type' => $asset_type])->all();

        return $this->render('liststary', [
            'items' => $items,
            'asset_type' => $asset_type,
        ]);
    }
    public function actionList($account_id)
    {
        $items = Asset::find()->where(['account_id' => $account_id])->all();

        foreach ($items as $lols) {
            $formattedId[$lols['account_id']] = strval($lols->account->account_holder) . ' - ' . strval($lols->account->account_type);

            return $this->render('list', [
                'items' => $items,
                'account_id' => $account_id,
                'formattedId' => $formattedId

            ]);
        }
    }

}

