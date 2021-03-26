# Ajax Progress Bar Widget for Yii2

Boostrap 4 progress bar widget with ability to update percent value by periodic ajax request. 

# Installation

`composer require walkboy/yii2-ajax-progress-bar:dev-master`


# Usage

In your view:
```php
<?= \walkboy\ProgressBar\ProgressBar::widget([
    'bars' => [
        [
            'percent' => $model->progressPercent, // initial percent
            'label' => $model->progressPercent.'&thinsp;%', // initial label
            'options' => ['class' => 'progress-bar-primary progress-bar-animated progress-bar-striped'],
        ],
    ],
    'url' => ['controller/some-progress', 'id' => $model->id],
    // 'period' => '10', // how often update request will be send (default 5 sec)
]) ?>
```

In your controller: 
```php
function actionSomeProgress($id)
{
    $model = $this->findModel($id);
    return [
        'percent' => $model->progressPercent,
        'label' => $model->progressPercent.'&thinsp;%',
    ];
}
```
