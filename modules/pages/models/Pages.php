<?php

namespace app\modules\pages\models;

use Yii;

/**
 * This is the model class for table "{{%pages}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $content
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 * @property integer $removed
 * @property integer $status
 * @property integer $locked
 * @property string $layout
 */
class Pages extends \sibds\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pages}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url', 'content'], 'required'],
            [['name', 'url', 'content'], 'string'],
            [['created_by', 'updated_by', 'removed', 'status', 'locked'], 'integer'],
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
            'url' => 'Ссылка (Url)',
            'layout' => 'Слой',
            'content' => 'Содержание',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'removed' => 'Removed',
            'locked' => 'Заблокированно',
        ];
    }
}
