<?php
namespace app\modules\forum;

class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();

        $this->params['post'] = 'ok';
        // ... остальной инициализирующий код ...
    }

    
}

?>