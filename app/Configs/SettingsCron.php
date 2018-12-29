<?php
/**
 * Параметры cron-задач
 *
 * @version 29.12.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Configs;

/**
 * Class SettingsCron
 *
 * @package Lemurro\Api\App\Configs
 */
class SettingsCron
{
    /**
     * Путь до лог-файла
     */
    const LOG_FILE = SettingsPath::LOGS . 'cron.log';

    /**
     * Массив email-адресов, куда отправлять письма с ошибками
     */
    const ERRORS_EMAILS = [];
}
