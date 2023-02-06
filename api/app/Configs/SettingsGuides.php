<?php
/**
 * Параметры справочников
 *
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 * @version 21.11.2019
 */

namespace Lemurro\Api\App\Configs;

/**
 * Class SettingsGuides
 *
 * @package Lemurro\Api\App\Configs
 */
class SettingsGuides
{
    /**
     * Связка конечных точек маршрута справочников и их namespaces для запуска
     *
     * Пример:
     *   конечная точка: example (используется в пути: /guide/example)
     *        namespace: Example (полный путь до каталога классов: /app/Guide/Example/)
     *
     * @var array
     */
    const CLASSES = [
        'example' => 'Example',
    ];
}
