<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\news\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'url')->widget(\sibds\widgets\translitInput::className(), ['fromField'=>'name']) ?>

    <?= $form->field($model, 'category_id')->widget(\kartik\widgets\Select2::className(),[
        'data' => \yii\helpers\ArrayHelper::map(
            \app\modules\news\models\NewsCategory::find()->all(), 'id', 'name')
    ]) ?>

    <?= $form->field($model, 'layout')->widget(\kartik\select2\Select2::className(), [
        'data'=>Yii::$app->controller->getLayouts(),
        'options' => ['placeholder' => 'Значение по умолчанию'],
        'addon' => [
            'prepend' => [
                'content' => \yii\bootstrap\Html::icon('open-file')
            ]
        ]
    ]) ?>

    <?= $form->field($model, 'image')->widget(\sibds\widgets\InputFile::className()) ?>

    <?= $form->field($model, 'date_public')->widget(\kartik\widgets\DatePicker::className(),[
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'value' => \Yii::$app->formatter->asDate(new \DateTime(), 'short'),
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]) ?>

    <?= $form->field($model, 'annotation')->widget(\sibds\widgets\CKEditor::className(), ['options' => ['rows' => 6],]) ?>

    <?= $form->field($model, 'content')->widget(\sibds\widgets\CKEditor::className(), ['options' => ['rows' => 6],]) ?>

    <?= $form->field($model, 'locked')->checkbox() ?>

    <?= \sibds\form\FormFooter::widget(['model'=>$model]); ?>

    <?php ActiveForm::end(); ?>

</div>
