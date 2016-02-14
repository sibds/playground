<?php

namespace app\modules\pages\controllers;

use app\controllers\StandartController;
use Yii;
use app\modules\pages\models\Pages;
use app\modules\pages\models\PagesSearch;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;


/**
 * PagesController implements the CRUD actions for Pages model.
 */
class PagesController extends StandartController
{
    /**
     * Displays a single Pages model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
}
