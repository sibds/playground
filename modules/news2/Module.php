<?php

namespace app\modules\news2;

/**
* news2 module definition class
*/
class Module extends \yii\base\Module
{
    /**
    * @inheritdoc
    */
    public $controllerNamespace = 'app\modules\news2\controllers';

    public $defaultRoute = 'news/list';

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}