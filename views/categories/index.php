<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\widgets\SideNav;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\categories\models\CategoriesSearch $searchModel
 */

$this->title = Yii::t('cm-categories', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php yii\widgets\Block::begin(array('id'=>'sidebar')); ?>

    <?php 
    $sideMenu = array();
    $sideMenu[] = array('icon'=>'book','label'=>Yii::t('cm-categories','Categories'),'url'=>Url::to(array('/categories/categories/index')));
    $sideMenu[] = array('icon'=>'plus','label'=>Yii::t('cm-categories','New Category'),'url'=>Url::to(array('/categories/categories/create')));

    echo SideNav::widget([
      'type' => SideNav::TYPE_INFO,
      'heading' => Yii::t('cm-categories','Categories Menu'),
      'items' => $sideMenu
    ]);
  ?>

<?php yii\widgets\Block::end(); ?>

<div class="workbench">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Categories',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    
Pjax::begin();

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'user_id',
            [
                'attribute' => 'mod_table',
                'value' => function($model, $index, $widget){
                    return Html::tag('div',$model->ModelString);
                }
            ]
            'mod_table',
            // 'mod_id',
            // 'system_key',
            // 'system_name',
            // 'system_upate',
            // 'created_at',
            // 'updated_at',
            // 'deleted_at',
            // 'parent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Categories</h3>',
            'type' => 'success',
            'showFooter' => false
        ]
    ]); 

Pjax::end();
    ?>

</div>
