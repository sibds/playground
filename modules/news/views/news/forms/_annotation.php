<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 05.03.16
 * Time: 16:00
 */
?>
<?= $form->field($model, 'annotation')->widget(\sibds\widgets\CKEditor::className(), ['options' => ['rows' => 6],]) ?>
