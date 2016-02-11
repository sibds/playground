<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property string $id
 * @property string $name
 * @property string $url
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property boolean $removed
 * @property boolean $locked
 */
class Pages extends \yii\db\ActiveRecord
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
            [['id', 'name', 'created_at', 'created_by', 'updated_at', 'updated_by', 'removed', 'locked'], 'required'],
            [['id', 'name', 'url', 'created_by', 'updated_by'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['removed', 'locked'], 'boolean'],
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
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'removed' => 'Removed',
            'locked' => 'Locked',
        ];
    }
}
