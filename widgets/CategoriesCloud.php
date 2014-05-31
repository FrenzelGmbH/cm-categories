<?php

namespace frenzelgmbh\cmcategories\widgets;

use \yii\helpers\Html;
use frenzelgmbh\appcommon\widgets\Portlet;
use frenzelgmbh\cmcategories\models\Categories;

class CategoriesCloud extends Portlet
{
  public $title  = 'Categroies';
  public $module = NULL;
  public $linkclass  = NULL;
  
  public function init() {
    parent::init();
  }

  protected function renderContent()
  {
    if(!is_null($this->module))
    {
      $categories = Categories::getOptions($this->module);
      foreach($categories as $key=>$value)
      {
        echo Html::a(strtoupper(Html::encode($value)), array('/site/index','category'=>$key,'reference'=>Html::encode($value)), array('class'=>$this->linkclass))
        ." // \n";
      }
    }
    else
    {
      echo " ";
    }
  }
}
