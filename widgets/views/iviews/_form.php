<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\web\JsExpression;

use kartik\widgets\ActiveForm;
use kartik\widgets\DepDrop;

/**
 * @var yii\web\View $this
 * @var app\modules\parties\models\Address $model
 * @var yii\widgets\ActiveForm $form
 */

$script = <<<SKRIPT

$('#submitCategoriesCreate').on('click',function(event){
  $('#CategoriesCreateForm').ajaxSubmit(
  {
    type : "POST",
    success: function(data){
      $('#caddressmod').modal('hide');
    }
  });
  event.preventDefault();
});

SKRIPT;

$this->registerJs($script);

?>

<div class="address-form">

  <?php $form = ActiveForm::begin([
    'id' => 'CategoriesCreateForm',
    'action' => Url::to(['/address/default/create']),
  ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 200]) ?>
    
    <?= $form->field($model, 'mod_table')->dropDownList($model::pdModules(),['id' => 'mod_table-id']) ?>

    <?= $form->field($model, 'parent')->widget(DepDrop::classname(),[
        'options' => ['id'=>'parent-id'],
        'pluginOptions' => [
          'depends' => ['mod_table-id'],
          'placeholder' => 'Select ...',
          'url' => Url::to(['/categories/categories/jsoncategories'])
        ]
      ]);
     ?>
    
    <div class="form-group navbar navbar-primary">
      <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'submitCategoriesCreate']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
