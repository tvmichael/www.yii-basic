<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "exchangecurrency".
 *
 * @property int $id
 * @property int $exchangeId
 * @property int $currencyId
 */
class ExchangeCurrency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'exchangecurrency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exchangeId', 'currencyId'], 'required'],
            [['exchangeId', 'currencyId'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'exchangeId' => 'Exchange ID',
            'currencyId' => 'Currency ID',
        ];
    }
}
