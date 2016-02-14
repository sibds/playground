<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\pages\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'class' => 'sibds\grid\UrlColumn',
                'attribute'=>'id',
                'width' => '50px',
                'hAlign' => 'center',
            ],
            [
                'class' => 'sibds\grid\UrlColumn',
                'attribute'=>'name',
                'showLock' => true,
            ],
            [
                'class' => 'sibds\grid\UrlColumn',
                'attribute'=>'url',
            ],
            [
                'attribute'=>'created_at',
                'format'=>['date', 'dd.MM.YYYY HH:mm'],
            ],
            [
                'attribute'=>'updated_at',
                'format'=>['date', 'dd.MM.YYYY HH:mm'],
            ],

            ['class' => 'sibds\grid\ActionColumn'],
        ],
        'pjax' => true, // pjax is set to always true for this demo
        // set your toolbar
        'toolbar' => [
            ['content' =>
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['update'], ['data-pjax' => 0, 'title' => 'Add Pages', 'class' => 'btn btn-success']) . ' ' .
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset Grid'])
            ],
            '{export}',
            '{toggleData}',
        ],
        // set export properties
        'export' => [
            'fontAwesome' => true
        ],
        // parameters from the demo form
        'bordered' => true,
        'striped' => false,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false                                                                                                                                                                                                                                                                                                          ,
        'panel' => [
            //'type' => GridView::TYPE_PRIMARY,
            'heading' => false,//$this->title,
        ],
        'persistResize' => false,
    ]); ?>
</div>
