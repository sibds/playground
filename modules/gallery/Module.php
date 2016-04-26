<?php

namespace app\modules\gallery;

use Yii;

/**
* gallery module definition class
*/
class Module extends \yii\base\Module
{
    /**
    * @inheritdoc
    */
    public $controllerNamespace = 'app\modules\gallery\controllers';

    public $defaultRoute = 'gallery/list';

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/gallery/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'ru-RU',
            'basePath' => '@app/modules/gallery/messages',
            'fileMap' => [
                'modules/gallery/gallery' => 'gallery.php',
                'modules/gallery/form' => 'form.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        if(!array_key_exists('modules/gallery/*', Yii::$app->i18n->translations))
        {
            Yii::$app->i18n->translations['modules/gallery/*'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'ru-RU',
                'basePath' => '@app/modules/gallery/messages',
                'fileMap' => [
                    'modules/gallery/gallery' => 'gallery.php',
                    'modules/gallery/form' => 'form.php',
                ],
            ];
        }

        return Yii::t('modules/gallery/' . $category, $message, $params, $language);
    }

}
