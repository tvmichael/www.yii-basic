<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag(['name' => 'keywords', 'content' => 'yii, framework, php']);
?>

<div class="site-helper">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the Test HTML page.
    </p>

    <hr>

    <?=Html::tag(
    	'p', 
    	Html::tag('label', Html::encode($message), ['class'=>'label label-default'] ),
    	['data'=>['random'=>rand(10,2), 'name'=>'MIK'], 'id'=>'p-1' ]
    );?>

    <?=Html::tag(
    	'p', 
    	Html::button('button', ['class'=>'btn btn-default', 'id'=>'b-1']),
    	['class'=>'page-text' , 'data'=>['random'=>rand(10,2), 'name'=>'MIK'], 'id'=>'p-1' ]
    );?>

    <div>
        <small>FORM</small>
        <pre><?php print_r($error);?></pre>
        <br>
        
        <?php
        $form = ActiveForm::begin();

        echo $form->field($user, 'name');
        echo $form->field($user, 'email');
        echo $form->field($user, 'selected')->checkBox();
        ?>
        <div class="form-group">
        <?php
        echo Html::submitButton('Надіслати', ['class' => 'btn btn-primary']);
        ?>
        </div>
        <?php ActiveForm::end();?>

    </div>
    

    <code><?= __FILE__ ?></code>
</div>
