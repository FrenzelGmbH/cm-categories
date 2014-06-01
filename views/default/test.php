<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var string $module
 * @var integer $id
 */

$this->title = Yii::t('cm-categories', 'test');
?>

<div class="categories-default-test">
	<h1><?= $this->context->action->uniqueId; ?></h1>
	
	<fieldset>
		<legend>Create Button</legend>

		<div class="well">
			<p>
				Here we make the test for the create button, that will open a modal to create an 
				asscociated address to the passed over: <br>
				* MODULE <br>
				* ID <br>
			</p>
		</div>

		<?php 
      if(class_exists('\frenzelgmbh\cmcategories\widgets\CreateCategoriesModal')){
        echo \frenzelgmbh\cmcategories\widgets\CreateCategoriesModal::widget(array(
          'module'      => '99'
        )); 
      }
    ?>

	</fieldset>

  <fieldset>
    <legend>Related Categories Grid</legend>

    <div class="well">
      <p>
        Here we make the test for the related address grid 
        which renders an asscociated address to the passed over: <br>
        * MODULE <br>
      </p>
    </div>

    <?php 
      if(class_exists('\frenzelgmbh\cmcategories\widgets\RelatedCategoriesGrid')){
        echo \frenzelgmbh\cmcategories\widgets\RelatedCategoriesGrid::widget(array(
          'module'      => '99'
        )); 
      }
    ?>

  </fieldset>

</div>
