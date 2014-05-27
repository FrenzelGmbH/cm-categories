<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var string $module
 * @var integer $id
 */

$this->title = Yii::t('cm-categories', 'test');
?>

<div class="posts-default-index">
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
      if(class_exists('\frenzelgmbh\cmcategories\widgets\CreateAddressModal')){
        echo \frenzelgmbh\cmcategories\widgets\CreateAddressModal::widget(array(
          'module'      => 'cm_address_test',
          'id'          => 1
        )); 
      }
    ?>

	</fieldset>

  <fieldset>
    <legend>Related Address Grid</legend>

    <div class="well">
      <p>
        Here we make the test for the related address grid 
        which renders an asscociated address to the passed over: <br>
        * MODULE <br>
        * ID <br>
      </p>
    </div>

    <?php 
      if(class_exists('\frenzelgmbh\cmcategories\widgets\RelatedAddressGrid')){
        echo \frenzelgmbh\cmcategories\widgets\RelatedAddressGrid::widget(array(
          'module'      => 'cm_address_test',
          'id'          => 1
        )); 
      }
    ?>

  </fieldset>

  <fieldset>
    <legend>IP Location</legend>

    <div class="well">
      <p>
        IP Location, based upon the information we get from the enviroment variables.
      </p>
    </div>

    <?php 
      if(class_exists('\frenzelgmbh\cmcategories\widgets\IPLocation')){
        echo \frenzelgmbh\cmcategories\widgets\IPLocation::widget(); 
      }
    ?>

  </fieldset>

</div>
