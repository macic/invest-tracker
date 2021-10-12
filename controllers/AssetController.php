<?php

namespace app\controllers;

use app\models\Account;
use app\models\AssetType;
use Yii;
use app\models\Asset;
use app\models\AssetSearch;
use yii\base\BaseObject;
use yii\db\Query;
use yii\debug\panels\EventPanel;
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
        $item = Asset::find()->where(['id' => $id])->one();

//        foreach ($items as $item) {
//            $asset_name[$item['asset_type_id']] = $item->assetType->name;


            return $this->render('view', [
                'model' => $this->findModel($id),
                'item' => $item,
//                'asset_name' => $asset_name
            ]);
//        }
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
        $assetsTypeData = AssetType::find()->all();

        return $this->render('create', [
            'model' => $model,
            'accounts' => $accountsData,
            'assetsTypeData' => $assetsTypeData
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
        $accountsData = Account::find()->all();
        $assetsTypeData = AssetType::find()->all();


        return $this->render('update', [
            'model' => $model,
            'accounts' => $accountsData,
            'assetsTypeData' => $assetsTypeData

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

    public function actionListing($asset_type_id=null)
    {
        if (!is_null($asset_type_id)) {
            $items = Asset::find()->where(['asset_type_id' => $asset_type_id])->all();
            $name = count($items)>0 ? $items[0]->assetType->name : "Wrong asset type id";
        } else {
            $items = Asset::find()->all();
            $name = 'Assets';
        }

        return $this->render('liststary', [
            'items' => $items,
            'asset_type_id' => $asset_type_id,
            'name' => $name
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

