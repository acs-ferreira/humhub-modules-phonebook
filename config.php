<?php

return [
    'id' => 'phonebook',
    'class' => '\humhub\modules\phonebook\Module',
    'namespace' => '\humhub\modules\phonebook',
    'events' => [
        [
            'class' => \humhub\widgets\TopMenu::class,
            'event' => \humhub\widgets\TopMenu::EVENT_INIT,
            'callback' => ['\humhub\modules\phonebook\Events', 'onTopMenuInit'],
        ],
        [
            'urlManagerRules' => ['telefonliste' => 'phonebook/index']
        ]
    ]
];
