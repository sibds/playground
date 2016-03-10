<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\pages2\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'url')->widget(\sibds\widgets\translitInput::className(), ['fromField'=>'name']) ?>

    <?= $form->field($model, 'content')->widget(\sibds\widgets\CKEditor::className(), ['options' => ['rows' => 6],])  ?>

    <?= $form->field($model, 'removed')->checkbox() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'locked')->checkbox() ?>

    <?= $form->field($model, , 'layout')->widget(\kartik\select2\Select2::className(), [
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
