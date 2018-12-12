<?php
/**
 * Основные параметры
 *
 * @version 12.12.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Configs;

/**
 * Class SettingsGeneral
 *
 * @package Lemurro\Api\App\Configs
 */
class SettingsGeneral
{
    /**
     * Это боевой сервер если стоит значение true
     */
    const PRODUCTION = false;

    /**
     * Это боевой сервер если стоит значение true
     */
    const APP_NAME = 'Lemurro';

    /**
     * Полный путь до корня (с конечной "/")
     */
    const FULL_ROOT_PATH = __DIR__ . '/../../';

    /**
     * Полный путь до каталога логов (с конечной "/")
     */
    const LOGS_PATH = __DIR__ . '/../../logs/';

    /**
     * Временная зона
     */
    const TIMEZONE = 'UTC';
}
