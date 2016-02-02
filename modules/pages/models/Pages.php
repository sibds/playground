<?php

namespace app\modules\pages\models;

use Yii;

/**
 * This is the model class for table "pages".
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
 * @property integer $locked
 */
class Pages extends \sibds\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url', 'content'], 'required'],
            [['name', 'url', 'content'], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'removed', 'locked'], 'safe'],
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'removed', 'locked'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'content' => 'Content',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'removed' => 'Removed',
            'locked' => 'Locked',
        ];
    }
}
