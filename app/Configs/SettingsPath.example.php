<?php

/**
 * Настройка путей
 *
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 * @version 21.11.2019
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
     *
     * @var string
     */
    const FULL_ROOT = __DIR__ . '/../../';

    /**
     * Полный путь до каталога логов (с конечной "/")
     *
     * @var string
     */
    const LOGS = __DIR__ . '/../../logs/';
}
