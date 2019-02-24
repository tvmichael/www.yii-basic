<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <p>
                    <a href="<?php echo Url::base(true).'/site/style';?>">1. Style test!</a>
                </p>
            </div>
            <div class="col-lg-12">
                <pre>
                    <?php
                    echo Url::home();
                    echo "<br>";
                    echo Url::home(true); echo "<br>";
                    echo Url::base(true);
                    
                    //print_r($_SESSION);
                    ///print_r($this);
                    ?>
                </pre>
            </div>

        </div>

    </div>
</div>
