<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 05.03.16
 * Time: 15:59
 */
?>
<?= $form->field($model, 'content')->widget(\sibds\widgets\CKEditor::className(), ['options' => ['rows' => 6],]) ?>
