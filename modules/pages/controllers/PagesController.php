<?php

namespace app\modules\pages\controllers;

use sibds\controllers\StandartController;
use Yii;


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
