<?php

namespace app\modules\news\models;

use sibds\components\ActiveRecord;
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
class NewsCategory extends ActiveRecord
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
            [['tree', 'lft', 'rgt', 'depth', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name', 'url'], 'required'],
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
            'name' => 'Название',
            'url' => 'Ссылка (Url)',
            'image' => 'Изображение',
            'description' => 'Описание',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'layout' => 'Слой',
        ];
    }

}
