<?php

namespace app\modules\news2\models;

use Yii;

/**
* This is the model class for table "{{%news_category}}".
*
    * @property integer $id
    * @property integer $tree
    * @property integer $lft
    * @property integer $rgt
    * @property integer $depth
    * @property string $name
    * @property string $url
    * @property string $image
    * @property string $description
    * @property integer $created_at
    * @property integer $created_by
    * @property integer $updated_at
    * @property integer $updated_by
    * @property string $layout
*/
class NewsCategory extends \sibds\components\ActiveRecord
{
    public static $BEFORE_QUERY = [];
    /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return '{{%news_category}}';
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['tree', 'lft', 'rgt', 'depth', 'created_by', 'updated_by'], 'integer'],
            [['lft', 'rgt', 'depth', 'name', 'url'], 'required'],
            [['name', 'url', 'image', 'description'], 'string'],
            [['layout'], 'string', 'max' => 50],
        ];
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
                    'id' => 'ID',
                    'tree' => 'Tree',
                    'lft' => 'Lft',
                    'rgt' => 'Rgt',
                    'depth' => 'Depth',
                    'name' => 'Name',
                    'url' => 'Url',
                    'image' => 'Image',
                    'description' => 'Description',
                    'created_at' => 'Created At',
                    'created_by' => 'Created By',
                    'updated_at' => 'Updated At',
                    'updated_by' => 'Updated By',
                    'layout' => 'Layout',
                ];
    }
}
