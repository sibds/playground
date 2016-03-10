<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\news2\models\NewsCategory */

$this->title = 'Update News Category: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'News Categories', 'url' => ['list']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="news-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
