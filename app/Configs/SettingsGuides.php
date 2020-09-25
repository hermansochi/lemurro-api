<?php

/**
 * Параметры справочников
 *
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 25.09.2020
 */

namespace Lemurro\Api\App\Configs;

use Lemurro\Api\Core\Abstracts\AbstractSettingsGuides;

/**
 * @package Lemurro\Api\App\Configs
 */
class SettingsGuides extends AbstractSettingsGuides
{
    /**
     * Связка конечных точек маршрута справочников и их namespaces для запуска
     *
     * Пример:
     *   конечная точка: example (используется в пути: /guide/example)
     *        namespace: Example (полный путь до каталога классов: /app/Guide/Example/)
     */
    public static array $classes = [
        'example' => 'Example',
    ];
}
