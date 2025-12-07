<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return App::config([
    'services' => [
        '_defaults' => [
            'autowire' => true,
            'autoconfigure' => true,
        ],
        'CleanArchi\\' => [
            'resource' => '../src/',
        ],
        '_instanceof' => [
            'CleanArchi\\Shared\\Application\\Messaging\\CommandHandler' => [
                'tags' => ['name' => 'messenger.message_handler', 'bus' => 'command.bus'],
            ],
            'CleanArchi\\Shared\\Application\\Messaging\\QueryHandler' => [
                'tags' => ['name' => 'messenger.message_handler', 'bus' => 'query.bus'],
            ],
            'CleanArchi\\Shared\\Application\\Messaging\\MessageHandler' => [
                'tags' => ['name' => 'messenger.message_handler', 'bus' => 'message.bus'],
            ],
            'CleanArchi\\Shared\\Application\\EventListener\\EventListener' => [
                'tags' => ['name' => 'messenger.message_handler'],
            ],
        ],
    ],
]);
