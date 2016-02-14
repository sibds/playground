<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 14.02.16
 * Time: 17:05
 */

namespace app\controllers\actions;


class UnlockAction extends BaseAction
{
    public function run()
    {
        $this->getModel()->unlock();

        if (\Yii::$app->request->isGet || \Yii::$app->request->isPost)
            return $this->redirect();

        return true;
    }
}