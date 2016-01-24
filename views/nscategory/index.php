<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 12.01.16
 * Time: 12:51
 */
use \yii\bootstrap\Html;
use yii\widgets\Pjax;

use slatiusa\nestable\Nestable;

$this->title = 'Category Editor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ns-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Создать {modelClass}', [
            'modelClass' => 'Nscategory',
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!-- Render create form -->
    <?= $this->render('//site/_form', [
        'model' => $model,
    ]) ?>


    <div class="row">
        <div class="col-lg-12">

            <?php Pjax::begin(['id' => 'nsitems']) ?>
            <?php
            echo Nestable::widget([
                'type' => Nestable::TYPE_WITH_HANDLE,
                'query' => \app\models\Nscategory::find()->roots()->one()?\app\models\Nscategory::find()->roots()->one()->children(1):null,
                'modelOptions' => [
                    'name' => 'name'
                ],
                'pluginEvents' => [
                    'change' => 'function(e) {}',
                ],
                'pluginOptions' => [
                    'maxDepth' => 7,
                ],
            ]);

            ?>
            <?php Pjax::end() ?>

        </div>
    </div>


</div>
