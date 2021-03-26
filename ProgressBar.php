<?php

namespace walkboy\ProgressBar;

use \yii\bootstrap4\Progress;
use \yii\helpers\Url;

class ProgressBar extends Progress
{
    public $url = '';
    public $period = 5;

    public $onDone = '';

    public function run()
    {
        ProgressBarAsset::register($this->getView());

        if (!isset($this->options['class'])) {
            $this->options['class'] = 'progress-bar-ajax';
        }
        $this->options['class'][] = 'progress-bar-ajax';

        if ($this->period) {
            $this->options['data-period'] = $this->period * 1000;
        }

        if ($this->url) {
            $this->options['data-url'] = Url::toRoute($this->url);
        }

        if ($this->onDone) {
            $this->view->registerJs($this->id.'_onDoneEvent='.$this->onDone);
        }

        return parent::run();
    }
}
