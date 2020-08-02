<?php
// yii2-widget-select2
// https://www.yiiframework.com/extension/yii2-widget-select2

use yii\web\View;
use yii\helpers\Html;

$this->title = 'Select2';
?>
<div class="site-select-2">
    <div>
        <?=Html::tag('h2', 'Select2', ['class' => 'padding bg-primary'])?>
        <?=Html::tag(
            'p',
            Html::a(
                'select 2',
                ['site/select-two', 'page' => 'lesson1'],
                ['class' => 'select2-a'])
        ); ?>
        <?=Html::tag(
            'p',
            Html::a(
                'array - categories',
                ['site/select-two', 'page' => 'lesson2'],
                ['class' => 'select2-a'])
        ); ?>
    </div>
</div>
