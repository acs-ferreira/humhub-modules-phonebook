<?php

return [
    'id' => 'phonebook',
    'class' => 'phonebook\humhub\modules\phonebook\Module',
    'namespace' => 'phonebook\humhub\modules\phonebook',
    'events' => [
        [
            'class' => \humhub\widgets\TopMenu::class,
            'event' => \humhub\widgets\TopMenu::EVENT_INIT,
            'callback' => ['phonebook\humhub\modules\phonebook\Events', 'onTopMenuInit'],
        ],
        [
            'urlManagerRules' => [
                'telefonliste' => 'phonebook/index'
        ]
];
