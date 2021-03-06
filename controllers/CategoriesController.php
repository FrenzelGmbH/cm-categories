<?php

namespace frenzelgmbh\cmcategories\controllers;

use Yii;
use frenzelgmbh\cmcategories\models\Categories;
use frenzelgmbh\cmcategories\models\CategoriesSearch;
use yii\web\NotFoundHttpException;
use frenzelgmbh\appcommon\controllers\AppController;
use yii\helpers\Json;
use yii\filters\VerbFilter;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends AppController
{
    /**
     * Set the default layout to the modules view column2
     * @var string
     */
    public $layout = 'column2';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Categories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoriesSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Categories model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categories;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (Yii::$app->request->isAjax) 
            {
                header('Content-type: application/json');
                echo Json::encode(['status'=>'DONE','model'=>$model]);
                exit();
            }
            else
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Categories model by an ajax request.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateajax()
    {
        $model = new Categories;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (Yii::$app->request->isAjax) 
            {
                header('Content-type: application/json');
                echo Json::encode(['status'=>'DONE','model'=>$model]);
                exit();
            }
            else
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * this produces an json array with the available categories for the passed
     * over module.
     */
    public function actionJsoncategories()
    {
        header('Content-type: application/json');
        $out = [];
        if(isset($_POST['depdrop_parents']))
        {
            $parents = $_POST['depdrop_parents'];
            if($parents != null)
            {
                $mod_table = $parents[0];
                $out = Categories::jsCategories($mod_table);
                echo Json::encode(['output'=>$out,'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'','selected'=>'']);
        exit;
    }

}
