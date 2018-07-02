<?php

namespace app\models;

use Yii;
use yii\base\Model;

class PlaypayForm extends Model
{
    public $cardFrom;
    public $cardTo;
    public $sumFrom;
    public $sumTo;
    public $exchange;

    public function rules(){
        $message = 'Не може бути пустим';
        return [
                ['cardFrom', 'required', 'message' => 'Поле з номером рахунку не може бути пустим'],
                ['cardTo', 'required', 'message' => 'Поле з номером рахунку не може бути пустим'],
                ['sumFrom', 'required', 'message' => 'Please1'],
                ['sumTo', 'required', 'message' => 'Please2'],
        ];
    }
}