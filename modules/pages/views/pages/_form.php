<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\pages\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'url')->widget(\sibds\widgets\translitInput::className(), ['fromField'=>'name']) ?>

    <?= $form->field($model, 'content')->widget(\sibds\widgets\CKEditor::className(), ['options' => ['rows' => 6],]) ?>

    <?= $form->field($model, 'locked')->checkbox() ?>

    <?= \sibds\form\FormFooter::widget(['model'=>$model]); ?>

    <?php ActiveForm::end(); ?>

</div>
