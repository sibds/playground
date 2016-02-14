<?php

namespace app\modules\news\models;

use sibds\components\ActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category_id
 * @property string $url
 * @property string $image
 * @property integer $date_public
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
class News extends ActiveRecord
{
    public static $BEFORE_QUERY = ['removed' => 0];
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
            [['removed', 'locked'], 'boolean'],
            ['date_public', 'date'],
            [['category_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
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
            'url' => 'Ссылка (Url)',
            'image' => 'Изображение',
            'date_public' => 'Дата публикации',
            'annotation' => 'Аннотация',
            'content' => 'Содержание',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'removed' => 'Removed',
            'locked' => 'Заблокировать',
            'layout' => 'Слой',
        ];
    }
}
