<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 14.02.16
 * Time: 22:29
 */

namespace app\modules\news\models;


use creocoder\nestedsets\NestedSetsQueryBehavior;
use yii\db\ActiveQuery;

class NewsCategoryQuery extends ActiveQuery
{
    public function behaviors() {
        return [
            NestedSetsQueryBehavior::className(),
        ];
    }
}