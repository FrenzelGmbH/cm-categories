<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Communication $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Communication',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Communications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="communication-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
