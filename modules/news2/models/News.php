<?php

namespace app\modules\news2\models;

use Yii;

/**
* This is the model class for table "{{%news}}".
*
    * @property integer $id
    * @property string $name
    * @property integer $category_id
    * @property string $url
    * @property string $image
    * @property string $date_public
    * @property string $annotation
    * @property string $content
    * @property integer $created_at
    * @property integer $created_by
    * @property integer $updated_at
    * @property integer $updated_by
    * @property integer $removed
    * @property integer $locked
    * @property string $layout
*/
class News extends \sibds\components\ActiveRecord
{
    // public static $BEFORE_QUERY = []; // for admin with categories
    public static $BEFORE_QUERY = ['removed' => 0]; // for admin
    /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['name', 'url', 'content'], 'required'],
            [['name', 'url', 'image', 'annotation', 'content'], 'string'],
            [['category_id', 'created_by', 'updated_by'], 'integer'],
            [['removed', 'locked'], 'boolean'],
            [['date_public'], 'string', 'max' => 10],
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
                    'name' => 'Название',
                    'category_id' => 'Категория',
                    'url' => 'Ссылка (URL)',
                    'image' => 'Изображение',
                    'date_public' => 'Date Public',
                    'annotation' => 'Аннотация',
                    'content' => 'Содержание',
                    'created_at' => 'Created At',
                    'created_by' => 'Created By',
                    'updated_at' => 'Updated At',
                    'updated_by' => 'Updated By',
                    'removed' => 'Removed',
                    'locked' => 'Заблокирован',
                    'layout' => 'Слой',
                ];
    }
}
