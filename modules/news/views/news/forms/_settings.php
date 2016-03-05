<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 05.03.16
 * Time: 15:59
 */
?>
<?= $form->field($model, 'category_id')->widget(\kartik\widgets\Select2::className(), [
    'data' => \yii\helpers\ArrayHelper::map(
        \app\modules\news\models\NewsCategory::find()->all(), 'id', 'name'),
    'addon' => [
        'prepend' => [
            'content' => \yii\bootstrap\Html::icon('list')
        ]
    ]
]) ?>

<?= $form->field($model, 'layout')->widget(\kartik\select2\Select2::className(), [
    'data' => Yii::$app->controller->getLayouts(),
    'options' => ['placeholder' => 'Значение по умолчанию'],
    'addon' => [
        'prepend' => [
            'content' => \yii\bootstrap\Html::icon('open-file')
        ]
    ]
]) ?>

<?= $form->field($model, 'date_public')->widget(\kartik\widgets\DatePicker::className(), [
    'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
    'value' => \Yii::$app->formatter->asDate(new \DateTime(), 'short'),
    'pluginOptions' => [
        'autoclose' => true
    ]
]) ?>

<?= $form->field($model, 'locked', ['template' => '{input}{label}{error}{hint}',])->
widget(
    \kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['threeState' => false]]) ?>
