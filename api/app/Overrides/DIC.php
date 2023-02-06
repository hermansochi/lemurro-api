<?php

namespace Lemurro\Api\App\Overrides;

use Pimple\Container;

/**
 * Добавление новых элементов в DIC
 */
class DIC
{
    /**
     * Добавление новых элементов в DIC
     */
    public function run(Container $dic): void
    {
        // Здесь вы можете добавлять свои элементы в контейнер
        // Используется контейнер Pimple (https://github.com/silexphp/Pimple)
        // Пример: $dic['my-element'] = 'My super element';
    }
}
