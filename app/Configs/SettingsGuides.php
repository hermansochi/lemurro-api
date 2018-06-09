<?php
/**
 * Параметры справочников
 *
 * @version 26.05.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
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
     */
    const CLASSES = [
        'example' => 'Example',
    ];
}
