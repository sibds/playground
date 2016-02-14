<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 14.02.16
 * Time: 17:03
 */

namespace app\controllers\actions;


class LockAction extends BaseAction
{
    public function run()
    {
        $this->getModel()->lock();

        if (\Yii::$app->request->isGet || \Yii::$app->request->isPost)
            return $this->redirect();

        return true;
    }
}