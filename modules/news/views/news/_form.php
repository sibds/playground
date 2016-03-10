<?php

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\news\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php if (\Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
        <div class="alert alert-success">
            <?=\Yii::$app->session->getFlash('contactFormSubmitted')?>
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'url')->widget(\sibds\widgets\translitInput::className(), ['fromField' => 'name']) ?>

    <?= $form->field($model, 'image')->widget(\sibds\widgets\InputFile::className()) ?>

    <?= \kartik\tabs\TabsX::widget([
        'items' => [
            [
                'label' => 'Основные данные',
                'content' => $this->render('forms/_main', ['form' => $form, 'model' => $model]),
                'active' => true
            ],
            [
                'label' => 'Аннотация',
                'content' => $this->render('forms/_annotation', ['form' => $form, 'model' => $model]),
            ],
            [
                'label' => 'Конфигурации',
                'content' => $this->render('forms/_settings', ['form' => $form, 'model' => $model]),
            ],
        ],
        'bordered'=>true,
        'encodeLabels'=>false
    ]) ?>

    <?= \sibds\form\FormFooter::widget(['model' => $model]); ?>

    <?php ActiveForm::end(); ?>

</div>
