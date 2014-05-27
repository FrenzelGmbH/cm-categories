<?php

namespace frenzelgmbh\cmcategories;

use yii\base\Module as BaseModule;

/**
 * Smart Weblog Module for Yii2
 *
 * @author Philipp frenzel <philipp@frenzel.net>
 */
class Module extends BaseModule {

    const VERSION = '0.1.0-dev';

    /**
     * @var string|null View path. Leave as null to use default "@user/views"
     */
    public $viewPath;

    /**
     * @var string|null main layout that should be used by default we set it to /main
     */
    public $layout = 'main';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->setAliases([
            '@cmcategories' => dirname(__FILE__)
        ]);
        \Yii::$app->i18n->translations['cm-categories'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@frenzelgmbh/cmcategories/messages',
        ];
        //get the displayed view and register the needed assets
        //as we have no view in this context we need to make the way over the $app->view
        communicationAsset::register(\Yii::$app->view);
    }
}
