<?php
namespace app\assets;

use yii\web\AssetBundle;

class MarzipanoAsset extends AssetBundle
{
    public $basePath = '@webroot/js/marzipano';
    public $baseUrl = '@web/js/marzipano';

    public $css = [
    ];

    public $js = [
        'marzipano.js',
    ];
}
