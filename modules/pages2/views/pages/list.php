<?php

use yii\helpers\Html;
use sibds\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\pages2\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">

    <h1><?= Html::encode($this->title) ?></h1>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <p>
        <?= Html::a('Create Pages', ['update'], ['class' => 'btn btn-success']) ?>
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

               [
                   'class' => 'sibds\grid\UrlColumn',
                   'attribute'=>'url',
               ],

               [
                   'class' => 'sibds\grid\UrlColumn',
                   'attribute'=>'content',
               ],

               [
                   'attribute'=>'created_at',
                   'format'=>['date', 'dd.MM.YYYY HH:mm'],
               ],
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'removed',
            // 'status',
            // 'locked',
            // 'layout',

        ['class' => 'sibds\grid\ActionColumn'],
        ],
        ]); ?>
        </div>
