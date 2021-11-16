<?php

namespace app\controllers;

use app\models\AssetType;
use app\models\Portfolio;
use Yii;
use app\models\PortfolioStructure;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PortfolioController implements the CRUD actions for PortfolioStructure model.
 */
class PortfolioController extends Controller
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
     * Lists all PortfolioStructure models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => PortfolioStructure::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PortfolioStructure model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
       // $assetsTypeData = AssetType::find()->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'assetsTypeData' => AssetType::find()->all(),
        ]);
    }

    /**
     * Creates a new PortfolioStructure model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id=null)
    {
        $postData = Yii::$app->request->post();
        if (count($postData)>0) {
            #save

            # zapisuje portfolio name albo updateuje - zaleznie czy jest przekazane $id

            # jezeli sie to uda to robie foreach na danych z portfoliostructure i zapisuje

            #@TODO
//            $portfolioStructure = new PortfolioStructure();
//            if ($portfolioStructure->load(Yii::$app->request->post()) && $portfolioStructure->save()) {
//                return $this->redirect(['view', 'id' => $portfolioStructure->id]);
//            }
        }

        $assetsTypeData = AssetType::find()->all();

        if (is_null($id)) {
            #empty portfolio
            $portfolio = new Portfolio();
            $portfolioStructure = array(new PortfolioStructure());
        }
        else {
            $portfolio_id = $id;
            $portfolio = Portfolio::find()->where(['id'=>$portfolio_id])->one();
            $portfolioStructure = $portfolio->portfolioStructures;
        }

//
//            $portfolio_id = $postData['Portfolio']['id'];
//            $portfolio = Portfolio::find()->where(['id'=>$portfolio_id]);
//            $portfolioStructure = $portfolio->getPortfolioStructures();
//            #unset($postData['SignupForm']['firstname']);




        return $this->render('create', [
            'portfolioStructure' => $portfolioStructure,
            'portfolio' => $portfolio,
            'assetsTypeData' => $assetsTypeData,

        ]);
    }

    /**
     * Updates an existing PortfolioStructure model.
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
        $assetsTypeData = AssetType::find()->all();

        return $this->render('update', [
            'model' => $model,
            'assetsTypeData' => $assetsTypeData
        ]);
    }

    /**
     * Deletes an existing PortfolioStructure model.
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
     * Finds the PortfolioStructure model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PortfolioStructure the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PortfolioStructure::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
