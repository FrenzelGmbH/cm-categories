<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DepDrop;

/**
 * @var yii\web\View $this
 * @var app\modules\categories\models\Categories $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 200]) ?>
    
    <?= $form->field($model, 'mod_table')->dropDownList($model::pdModules(),['id' => 'mod_table-id']) ?>

    <?= $form->field($model, 'parent')->widget(DepDrop::classname(),[
    		'options' => ['id'=>'parent-id'],
    		'pluginOptions' => [
    			'depends' => 'mod_table-id',
    			'placeholder' => 'Select ...',
    			'url' => Url::to(['/categories/categories/jsoncategories'])
    		]
    	]);
     ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
