<?php

namespace app\controllers\actions;
use creocoder\nestedsets\NestedSetsBehavior;

/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 14.02.16
 * Time: 14:41
 */
class UpdateAction extends BaseAction
{
    public function run()
    {
        $model = $this->getModel();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            if($this->testBehavior(new NestedSetsBehavior()))
                $model->makeRoot();
            else
                $model->save();

            if (isset($_GET['close']))
                return $this->redirect();

            return $this->redirect([$this->id, 'id' => $model->id]);
        } else {
            return $this->render([
                'model' => $model,
            ]);
        }
    }
}