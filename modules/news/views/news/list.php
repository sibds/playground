<?php

use yii\helpers\Html;
use sibds\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\news\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->context->action->id === 'trash' ? 'Trash news' : 'News';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
    ]); ?>
</div>
