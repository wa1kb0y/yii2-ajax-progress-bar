<?php

namespace walkboy\ProgressBar;

use \yii\bootstrap4\Progress;
use \yii\helpers\Url;

class ProgressBar extends Progress
{
    /** @var string url for ajax request should return current progress data */
    public $url = '';

    /** @var int period in seconds */
    public $period = 5;

    /** @var string js code will be executed when `data.percent` == 100 value received */
    public $onDone = '';

    /** @var string js code will be executed on each interval firing */
    public $onPeriod = '';

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

        if ($this->onPeriod) {
            $this->view->registerJs($this->id.'_onPeriodEvent='.$this->onPeriod);
        }

        return parent::run();
    }
}
