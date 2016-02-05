<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\pages\models\Pages */

$this->title = 'Update Pages: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pages-update">

    <h1><?= Html::encode($this->title) ?></h1>

   



    <div class="pages-form">

	    <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

	    <?= $form->field($model, 'url')->textarea(['rows' => 6]) ?>

	    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

	    <?= $form->field($model, 'created_at')->textInput() ?>

	    <?= $form->field($model, 'created_by')->textInput() ?>

	    <?= $form->field($model, 'updated_at')->textInput() ?>

	    <?= $form->field($model, 'updated_by')->textInput() ?>

	    <?= $form->field($model, 'removed')->textInput() ?>

	    <?= $form->field($model, 'locked')->textInput() ?>

	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>

	</div>










</div>
