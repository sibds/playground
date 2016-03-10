<?php

use yii\helpers\Html;
use sibds\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\news2\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <p>
        <?= Html::a('Create News', ['update'], ['class' => 'btn btn-success']) ?>
    </p>
                <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

        
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
            'category_id',

               [
                   'class' => 'sibds\grid\UrlColumn',
                   'attribute'=>'url',
               ],

               [
                   'class' => 'sibds\grid\UrlColumn',
                   'attribute'=>'image',
               ],
            // 'date_public',
            // 'annotation:ntext',
            // 'content:ntext',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'removed',
            // 'locked',
            // 'layout',

        ['class' => 'sibds\grid\ActionColumn'],
        ],
        ]); ?>
        </div>
