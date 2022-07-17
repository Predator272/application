<?php

namespace app\controllers;

use app\models\Friend;
use yii\data\ActiveDataProvider;
use app\models\FriendSearch;
use app\models\UserSearch;
use app\models\User;
use yii\debug\models\timeline\Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FriendController implements the CRUD actions for Friend model.
 */
class FriendController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Friend models.
     *
     * @return string
     */
    public function actionIndex()
    { 
        $models = Friend::find()->all();
        $searchModel = new FriendSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'models' => $models,
        ]);
    }

    /**
     * Displays a single Friend model.
     * @param string $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Friend model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Friend();
        $models = Friend::find()->all();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'models' => $models,
        ]);
    }
  public function actionSearch(){

   
    $model = new Friend();
    $models = Friend::find()->all();
        $searchModel = new FriendSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('search', [
          
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'model' => $model,
            'models' => $models,
        ]);
  }
  public function actionPoisk(){
       
    $model = User::find()->all();
        $searchModel = new User();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $models = User::find()->all();
        return $this->render('poisk', [
          
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'models' => $models,
            'model'=>$model,
          
        ]);
  }
   
  public function actionUp(){
        
    
}
    /**
     * Updates an existing Friend model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Friend model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Friend model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Friend the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Friend::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
