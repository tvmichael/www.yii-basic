<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron">
        <h2>Lessons</h2>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Component
                            <a href="https://demos.krajee.com/widget-details/select2">Select2</a>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <p><a href="<?php echo Url::to(['/site/select-two']);?>">Select2 JS</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Form</h3>
                    </div>
                    <div class="panel-body">
                        <p><a href="<?php echo Url::to(['/site/load-file']);?>">Load file</a></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Marzipano</h3>
                    </div>
                    <div class="panel-body">
                        <p><a href="<?php echo Url::to(['/site/marzipano']);?>">Marzipano</a></p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
