<?php

namespace app\modules\news;

/**
 * news module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\news\controllers';

    /**
     * @inheritdoc
     */
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
