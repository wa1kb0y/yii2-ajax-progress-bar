<?php

namespace walkboy\ProgressBar;

use yii\web\AssetBundle;

class ProgressBarAsset extends AssetBundle
{
    public $sourcePath = __DIR__.'/assets';
    public $js = [
        'progress.js',
    ];

    public $depends = [
        \yii\web\YiiAsset::class
    ];
}