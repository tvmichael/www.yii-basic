<?php

namespace app\models\lessons;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $code
 * @property string $name
 * @property int $population
 * @property int $visited
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['population', 'visited'], 'integer'],
            [['code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 52],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Код',
            'name' => 'Імя',
            'population' => 'Населення',
            'visited' => 'Відвідав',
        ];
    }
}
