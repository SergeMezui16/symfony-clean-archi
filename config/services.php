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
    ],
]);
