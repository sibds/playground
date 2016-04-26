<?php

namespace app\modules\gallery\models;

use Yii;

/**
 * This is the model class for table "gallery_image".
 *
 * @property integer $id
 * @property string $type
 * @property string $ownerId
 * @property integer $rank
 * @property string $name
 * @property string $description
 */
class GalleryImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'ownerId', 'name', 'description'], 'string'],
            [['ownerId'], 'required'],
            [['rank'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'ownerId' => 'Owner ID',
            'rank' => 'Rank',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }
}
