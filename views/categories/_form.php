<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\categories\models\Categories $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 200]) ?>
    
    <?= $form->field($model, 'mod_table')->dropDownList($model::pdModules()) ?>

    <?= $form->field($model, 'parent')->dropDownList($model::pdCategories('1')) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
