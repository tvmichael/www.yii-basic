<?php

namespace app\models;

use Yii;
use yii\base\Model;

class HelperForm extends Model
{
    public $name;
    public $email;
    public $login;
    public $selected;

    public function rules()
    {
        return [
            [['email', 'login'], 'required'],
            ['email', 'email'],
            ['selected', 'boolean'],
            ['name', 'default', 'value' => 'Mister Smit'],
        ];
    }

    public function attributeLabels(){
        return [
            'name'=>'Імя',
            'email'=>'Електронна адреса',
            'login'=>'Логін',
            'selected'=>'Вибрано',
        ];
    }
}

?>