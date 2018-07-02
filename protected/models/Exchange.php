<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "exchange".
 *
 * @property int $id
 * @property string $system
 * @property string $image
 * @property string $name
 */
class Exchange extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'exchange';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['system', 'image', 'name'], 'required'],
            [['system', 'image', 'name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'system' => 'System',
            'image' => 'Image',
            'name' => 'Name',
        ];
    }
}
