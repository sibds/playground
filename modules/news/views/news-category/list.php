<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\news\models\NewsCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create News Category', ['update'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['id' => 'news-category']) ?>
        <?php
        echo sibds\widgets\Nestable::widget([
            'autoQuery' => \app\modules\news\models\NewsCategory::find()
        ]);
        ?>
    <?php Pjax::end() ?>
</div>
