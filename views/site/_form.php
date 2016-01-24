<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Countries */
/* @var $form yii\widgets\ActiveForm */
?>

<?php

$this->registerJs(
    '$("document").ready(function(){
        $("#new_nsitem").on("pjax:end", function() {
            $.pjax.reload({container:"#nsitems"});  //Reload GridView
        });
    });'
);

?>

<div class="nsitem-form">

    <?php yii\widgets\Pjax::begin(['id' => 'new_nsitem']) ?>
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 200]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Cоздать') : Yii::t('app', 'Обновить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php yii\widgets\Pjax::end() ?>
</div>