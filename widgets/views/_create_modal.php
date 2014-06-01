<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;

?>

<?php 
  
Modal::begin([
  'id'=>'ccategroiesmod',
  'header' => '<i class="fa fa-info"></i>Loading',
]);
echo 'pls. wait one moment...';
Modal::end();

$modalJS = <<<MODALJS

opencategoriesmod = function(){
    var th=$(this), id=th.attr('id').slice(0);  
    $('#ccategroiesmod').modal('show');
    $('#ccategroiesmod div.modal-header').html('Add Address');
    $('#ccategroiesmod div.modal-body').load(th.attr('href'));
    return false;
};

$('#mod_address_add').on('click',opencategoriesmod);

MODALJS;

  $this->registerJs($modalJS);

?>

<?= Html::a(\Yii::t('app','Create'), [
    '/categories/default/create',
    'module' => $module, 
    'id' => $id,
  ], 
  [
    'class' => 'btn btn-info navbar-btn',
    'id' => 'mod_address_add'
  ]
);?>
