<?php
/**
 * Настройка путей
 *
 * @version 12.12.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Configs;

/**
 * Class SettingsPath
 *
 * @package Lemurro\Api\App\Configs
 */
class SettingsPath
{
    /**
     * Полный путь до корня (с конечной "/")
     */
    const FULL_ROOT = __DIR__ . '/../../';

    /**
     * Полный путь до каталога логов (с конечной "/")
     */
    const LOGS = __DIR__ . '/../../logs/';
}
