<?php

namespace frenzelgmbh\cmcategories\widgets;

use \yii\helpers\Html;
use frenzelgmbh\appcommon\widgets\Portlet;
use frenzelgmbh\cmcategories\models\Categories;

class CategoriesCloud extends Portlet
{
  /**
   * const WIDGET_NAME must be defined for all widgets!
   */
  const WIDGET_NAME = 'CATEGORIES_CLOUD';

  /**
   * the title, that will be diplayed in the portlet head
   * @param string $title
   */
  public $title  = 'Categories';
  
  /**
   * module for which the category will be looked up
   */
  public $module = NULL;

  /**
   * the styling for the links
   */
  public $linkclass  = NULL;
  
  /**
   * target that will be used to jump to from the cloud
   * @param string $target
   */
  public $target = '/site/index';  

  /**
   * renders the content for the widget
   */
  protected function renderContent()
  {
    if(!is_null($this->module))
    {
      $categories = Categories::getOptions($this->module);
      foreach($categories as $key=>$value)
      {
        echo Html::a(strtoupper(Html::encode($value)), array($this->target,'category'=>$key,'reference'=>Html::encode($value)), array('class'=>$this->linkclass))
        ." // \n";
      }
    }
    else
    {
      echo " ";
    }
  }
}
