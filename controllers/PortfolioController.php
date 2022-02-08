<?php

namespace app\controllers;

use app\models\AssetType;
use app\models\Portfolio;
use TheSeer\Tokenizer\Exception;
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
        $portfolios = Portfolio::find()->where(['user_id' => Yii::$app->user->getId()])->all();

            return $this->render('index', [
                'items' => $portfolios,
            ]);
    }

    /**
     * Displays a single PortfolioStructure model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id)
    {
        $portfolio = Portfolio::findOne($id);

        return $this->render('view', [
           // 'model' => $this->findModel($id),
            'assetsTypeData' => AssetType::find()->all(),
            'item' => $portfolio
        ]);
    }

    /**
     * Creates a new PortfolioStructure model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $assetsTypeData = AssetType::find()->all();
        $portfolio = new Portfolio();
        $portfolioStructure = new PortfolioStructure();
        $postData = Yii::$app->request->post();


        // ["PortfolioStructure"]=> array(2) { ["asset_type_id"]=> array(1) { [0]=> string(1) "2" } ["percentage"]=> array(1) { [0]=> string(3) "123" }
        if (count($postData)>0) {

           $portfolio->user_id = Yii::$app->user->getId();

            if ($portfolio->load($postData) && $portfolio->save()) {
                $count = count($postData['PortfolioStructure']['asset_type_id']);
                for($i = 0; $i < $count; $i++) {
                    $portfolioStructure = new PortfolioStructure();
                    $dataToSave['_csrf'] = $postData['_csrf'];
                    $dataToSave['PortfolioStructure']['asset_type_id'] = $postData['PortfolioStructure']['asset_type_id'][$i];
                    $dataToSave['PortfolioStructure']['percentage'] = $postData['PortfolioStructure']['percentage'][$i];
                    $dataToSave['PortfolioStructure']['portfolio_id'] = $portfolio->getPrimaryKey();
                    if(!($portfolioStructure->load($dataToSave) && $portfolioStructure->save())) {
                        break;
                    }
                }
            }
            return $this->redirect('/index');
        }

        return $this->render('create', [
            'portfolioStructure' => $portfolioStructure,
            'portfolio' => $portfolio,
            'assetsTypeData' => $assetsTypeData,
        ]);



////        to poniżej było oraz $id=null w nawiasie actionCreate()
//        $postData = Yii::$app->request->post();
//        if (count($postData)>0) {
//            #save
//
//            # zapisuje portfolio name albo updateuje - zaleznie czy jest przekazane $id
//
//            # jezeli sie to uda to robie foreach na danych z portfoliostructure i zapisuje
//
//            #@TODO
////            $portfolioStructure = new PortfolioStructure();
////            if ($portfolioStructure->load(Yii::$app->request->post()) && $portfolioStructure->save()) {
////                return $this->redirect(['view', 'id' => $portfolioStructure->id]);
////            }
//        }
//
//        $assetsTypeData = AssetType::find()->all();
//
//        if (is_null($id)) {
//            #empty portfolio
//            $portfolio = new Portfolio();
//            $portfolioStructure = array(new PortfolioStructure());
//        }
//        else {
//            $portfolio_id = $id;
//            $portfolio = Portfolio::find()->where(['id'=>$portfolio_id])->one();
//            $portfolioStructure = $portfolio->portfolioStructures;
//        }
//
////
////            $portfolio_id = $postData['Portfolio']['id'];
////            $portfolio = Portfolio::find()->where(['id'=>$portfolio_id]);
////            $portfolioStructure = $portfolio->getPortfolioStructures();
////            #unset($postData['SignupForm']['firstname']);
//
//
//
//
//        return $this->render('create', [
//            'portfolioStructure' => $portfolioStructure,
//            'portfolio' => $portfolio,
//            'assetsTypeData' => $assetsTypeData,
//
//        ]);
    }

    /**
     * Updates an existing PortfolioStructure model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(int $id)
    {
        $assetsTypeData = AssetType::find()->all();

        $postData = Yii::$app->request->post();
        if (count($postData)>0) {
            #update portfolio name
            $portfolio = Portfolio::findOne($id);
            if ($portfolio->load($postData) && $portfolio->save()) {

                unset($postData['Portfolio']);

                $portfolioStructure = PortfolioStructure::find()->indexBy('id')->all();

                if (PortfolioStructure::loadMultiple($portfolioStructure, $postData) && PortfolioStructure::validateMultiple($portfolioStructure)) {
                    foreach ($portfolioStructure as $structure) {
                        $structure->save(false);
                    }
                    return $this->redirect('index');
                }
                return $this->render('update', [
                    'portfolioStructure' => $portfolioStructure,
                    'assetsTypeData' => $assetsTypeData,
                    'portfolio' => $portfolio,

                    ]);

            }
            # zapisuje portfolio name albo updateuje - zaleznie czy jest przekazane $id

            # jezeli sie to uda to robie foreach na danych z portfoliostructure i zapisuje

            #@TODO
//            $portfolioStructure = new PortfolioStructure();
//            if ($portfolioStructure->load(Yii::$app->request->post()) && $portfolioStructure->save()) {
//                return $this->redirect(['view', 'id' => $portfolioStructure->id]);
//            }
        }



//        $assetsTypeData = AssetType::find()->all();
//
//        $portfolio_id = $id;
//        $portfolio = Portfolio::find()->where(['id'=>$portfolio_id])->one();
//        $portfolioStructure = $portfolio->portfolioStructures;
//
//
//
//        return $this->render('create', [
//            'portfolioStructure' => $portfolioStructure,
//            'portfolio' => $portfolio,
//            'assetsTypeData' => $assetsTypeData,

     //   ]);
    }

    /**
     * Deletes an existing PortfolioStructure model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete(int $id)
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
