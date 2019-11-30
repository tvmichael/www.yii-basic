<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Congratulations!</h2>
        <p class="lead">You have successfully created your Yii-powered application.</p>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <p><a href="<?php echo Url::to(['/site/select-two']);?>">SelectTwo</a></p>
            </div>

        </div>

    </div>
</div>
