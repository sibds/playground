<?php

namespace app\models;

use Yii;
use creocoder\nestedsets\NestedSetsBehavior;

/**
 * This is the model class for table "nscategory".
 *
 * @property integer $id
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property string $name
 */
class Nscategory extends \sibds\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nscategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['lft', 'rgt', 'depth'], 'integer'],
            [['locked', 'removed'], 'boolean'],
            [['name'], 'string'],
        ];
    }

    public function behaviors() {
        return [
            'tree' => [
                'class' => NestedSetsBehavior::className(),
                //'treeAttribute' => 'tree',
                'leftAttribute' => 'lft',
                'rightAttribute' => 'rgt',
                'depthAttribute' => 'depth',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'depth' => 'Depth',
            'name' => 'Name',
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    /**
     * @inheritdoc
     * @return NscategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NscategoryQuery(get_called_class());
    }

    public function duplicate()
    {
        parent::duplicate();
    }
}
