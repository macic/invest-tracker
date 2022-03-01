<?php

namespace app\controllers;

use app\models\Account;
use app\models\AssetType;
use app\models\Portfolio;
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

//        foreach ($item as $items) {
//            $account_name = $items->account->name;

            return $this->render('view', [
                'model' => $this->findModel($id),
                'item' => $item,
     //           'account_name' => $account_name
            ]);
    //    }
    }

    /**
     * Creates a new Asset model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param int $portfolio_id
     * @param int $asset_type_id
     * @return mixed
     */

    public function actionCreate($portfolio_id = null, $asset_type_id = null)
    {

        $model = new Asset();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $accountsData = Account::find()->where(['user_id'=>Yii::$app->user->getId()])->all();
        $assetsTypeData = AssetType::find()->all();
        $portfolioData = Portfolio::find()->where(['user_id'=>Yii::$app->user->getId()])->all();

        return $this->render('create', [
            'model' => $model,
            'accountsData' => $accountsData,
            'assetsTypeData' => $assetsTypeData,
            'portfolioData' => $portfolioData,
            'portfolio_id' => $portfolio_id,
            'asset_type_id' => $asset_type_id
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
        $accountsData = Account::find()->where(['user_id'=>Yii::$app->user->getId()])->all();
        $assetsTypeData = AssetType::find()->all();
        $portfolioData = Portfolio::find()->where(['user_id'=>Yii::$app->user->getId()])->all();


        return $this->render('update', [
            'model' => $model,
            'accountsData' => $accountsData,
            'assetsTypeData' => $assetsTypeData,
            'portfolioData' => $portfolioData


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

        return $this->redirect(['listing']);
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

    public function actionListing()
    {
        $items = Asset::find()->innerJoin('portfolio', 'asset.portfolio_id = portfolio.id')
            ->where(['user_id'=>Yii::$app->user->getId()])->all();

        //        if (!is_null($asset_type_id)) {
//            $items = Asset::find()->where(['asset_type_id' => $asset_type_id])->all();
//            $name = count($items)>0 ? $items[0]->assetType->name : "Wrong asset type id";
//        } else {
//            $items = Asset::find()->all();
//            $name = 'Assets';
//        }



        return $this->render('liststary', [
            'items' => $items,
//            'asset_type_id' => $asset_type_id,
//            'name' => $name
        ]);
    }
    public function actionList($account_id)
    {
        $items = Asset::find()->where(['account_id' => $account_id])->all();

        if (count($items)>0) {
            foreach ($items as $lols) {
                $formattedId[$lols['account_id']] = strval($lols->account->account_type) . ' ' . strval($lols->account->broker) . ', Holder: ' . $lols->account->accountHolder->name;

                return $this->render('list', [
                    'items' => $items,
                    'account_id' => $account_id,
                    'formattedId' => $formattedId

                ]);
            }
        } else {
            $this->redirect(['/asset/create']);
        }
    }

}

