<?php

namespace frenzelgmbh\cmcategories\widgets;

use Yii;

use frenzelgmbh\cmcategories\models\Categories;
use frenzelgmbh\cmcategories\models\CategoriesSearch;

use frenzelgmbh\appcommon\widgets\Portlet;

/**
 * Related Address Grid
 * @author Philipp Frenzel <philipp@frenzel.net>
 * @copyright Copyright (c) 2014, Frenzel GmbH
 */

class RelatedCategoriesGrid extends Portlet
{
	/**
	 * const WIDGET_NAME must be defined for all widgets!
	 */
	const WIDGET_NAME = 'RELATED_CATEGORIES_GRID';
	
	/**
	 * [$title description]
	 * @var string title that will be displayed when enabling Admin Portlet
	 */
	public $title='Related Categories';
	
	/**
	 * [$module description]
	 * @var string the module, mostly we recommend to take the table name in which records will be stored
	 */
	public $module = NULL;

	/**
	 * [init description]
	 * @return bool the result of the parent init call
	 */
	public function init() {		
		\frenzelgmbh\cmcategories\categoriesAsset::register(\Yii::$app->view);
		return parent::init();
	}

	/**
	 * [renderContent description]
	 * @return [type] [description]
	 */
	protected function renderContent()
	{
		$searchModel = new CategoriesSearch;
    	$dataProvider = $searchModel->search(Yii::$app->request->getQueryParams(),$this->module);

	    echo $this->render('@frenzelgmbh/cmcategories/widgets/views/_categories_grid', [
	        'dataProvider' => $dataProvider,
	        'searchModel' => $searchModel,
	    ]);
	}

}