<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 14.02.16
 * Time: 17:02
 */

namespace app\controllers\actions;


class DeleteAction extends BaseAction
{
    public function run()
    {
        /**
         * @var ActiveRecord
         */
        $model = $this->getModel();

        if (!$model->isNewRecord)
            $model->delete();

        if (\Yii::$app->request->isGet || \Yii::$app->request->isPost)
            return $this->redirect();

        return true;
    }
}