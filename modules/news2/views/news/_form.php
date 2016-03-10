<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\news2\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'url')->widget(\sibds\widgets\translitInput::className(), ['fromField'=>'name']) ?>

    <?= $form->field($model, 'image')->widget(\sibds\widgets\InputFile::className()) ?>

    <?= $form->field($model, 'date_public')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'annotation')->widget(\sibds\widgets\CKEditor::className(), ['options' => ['rows' => 6],])  ?>

    <?= $form->field($model, 'content')->widget(\sibds\widgets\CKEditor::className(), ['options' => ['rows' => 6],])  ?>

    <?= $form->field($model, 'removed')->checkbox() ?>

    <?= $form->field($model, 'locked')->checkbox() ?>

    <?= $form->field($model, 'layout')->widget(\kartik\select2\Select2::className(), [
        'data'=>\Yii::$app->controller->getLayouts(),
        'options' => ['placeholder' => 'Значение по умолчанию'],
        'addon' => [
            'prepend' => [
                'content' => \yii\bootstrap\Html::icon('open-file')
            ]
        ]
    ]) ?>


    <?=  \sibds\form\FormFooter::widget(['model'=>$model]); ?>

    <?php ActiveForm::end(); ?>

</div>
