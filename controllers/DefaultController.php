<?php

namespace frenzelgmbh\cmcategories\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;

use frenzelgmbh\appcommon\controllers\AppController;
use frenzelgmbh\cmcategories\models\Catgegories;

class DefaultController extends AppController
{
  
  /**
   * controlling the different access rights
   * @return [type] [description]
   */
  public function behaviors()
  {
    return [
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'delete' => ['post'],
        ],
      ],
      'AccessControl' => [
        'class' => '\yii\filters\AccessControl',
        'rules' => [
          [
            'allow'=>true,
            'actions'=>array(
              'index',
              'test',
              'create'
            ),
            'roles'=>array('*'),
          ],
          [
            'allow'=>true,
            'actions'=>array(              
              'test',
              'create'
            ),
            'roles'=>array('?'),
          ]
        ]
      ]
    ];
  }

  /**
   * [actionIndex description]
   * @return [type] [description]
   */
	public function actionIndex()
	{
    return $this->render('index');
	}

  /**
   * [actionTest description]
   * @return [type] [description]
   */
  public function actionTest()
  {
    $this->layout = 'column2';
    return $this->render('test');
  }

  /**
   * [actionCreate description]
   * @param string module
   * @param integer id
   * @return view         [description]
   */
  public function actionCreate($module=NULL,$id=NULL){
    $model = new Categories;

    if ($model->load(Yii::$app->request->post()) && $model->save()) 
    {
      if (\Yii::$app->request->isAjax) 
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
    else 
    {
      if(!is_null($module) && !is_null($id))
      {
        $model->mod_table = $module;
        $model->mod_id = $id;  
      }
      return $this->renderAjax('@frenzelgmbh/cmcategories/widgets/views/iviews/_form', [
          'model' => $model,
      ]);
    }
  }

}
