<?php

namespace humhub\modules\phonebook;

use Yii;
use yii\helpers\Url;
use yii\base\Object;

class Events extends Object
{

    /**
     * Defines what to do when the top menu is initialized.
     *
     * @param $event
     */
    public static function onTopMenuInit($event)
    {
        $event->sender->addItem([
            'label' => Yii::t('PhonebookModule.base', 'Phonebook'),
            'icon' => '<i class="fa fa-phone"></i>',
            'url' => Url::to(['/phonebook/index']),
            'sortOrder' => 500,
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'phonebook' && Yii::$app->controller->id == 'index'),
        ]);
    }

}
