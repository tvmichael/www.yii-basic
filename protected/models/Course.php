<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Course".
 *
 * @property int $id
 * @property string $ccy
 * @property string $base_ccy
 * @property double $buy
 * @property double $sale
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ccy', 'base_ccy', 'buy', 'sale'], 'required'],
            [['ccy', 'base_ccy'], 'string'],
            [['buy', 'sale'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ccy' => 'Ccy',
            'base_ccy' => 'Base Ccy',
            'buy' => 'Buy',
            'sale' => 'Sale',
        ];
    }
}
