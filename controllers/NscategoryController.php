<?php

namespace app\controllers;

use \Yii;
use app\models\Nscategory;

class NscategoryController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'nodeMove' => [
                'class' => 'slatiusa\nestable\NodeMoveAction',
                'modelName' => Nscategory::className(),
            ],
        ];
    }

    public function actionUpdate($id){
        return $this->render('index', ['model'=>Nscategory::findOne(['id'=>$id])]);
    }

    public function actionIndex()
    {
        $model = new Nscategory();

        if(Yii::$app->request->isAjax){
            echo 'Ajax';
        }
        if(Yii::$app->request->isPjax){
            echo 'Pjax';
        }
        if (Yii::$app->request->isPost)
        {
            echo 'Post';
            $model = new Nscategory();
            $model->load(Yii::$app->request->post());
            if($model->validate()){
                if(Nscategory::find()->roots()->count()<=0){
                    $root=new Nscategory(['name'=>'Основная']);
                    $root->makeRoot();
                }
                $root = Nscategory::find()->roots()->one();
                $model->appendTo($root);
            }

            $model = new Nscategory(); // reset model
        }

        return $this->render('index', ['model'=>$model]);
    }

}
