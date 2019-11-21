<?php
/**
 * Параметры cron-задач
 *
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 * @version 21.11.2019
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
     * Префикс для имён заданий
     *
     * В случае, когда у вас на одном сервере несколько проектов, имена задач обязательно должны отличаться,
     * иначе это приводит к конфликтам при запуске задач
     *
     * @var string
     */
    const NAME_PREFIX = 'MyApp1';

    /**
     * Путь до лог-файла
     *
     * @var string
     */
    const LOG_FILE = SettingsPath::LOGS . 'cron.log';

    /**
     * Массив email-адресов, куда отправлять письма с ошибками
     *
     * @var array
     */
    const ERRORS_EMAILS = [];

    /**
     * Выполнять (true) или нет (false) cron-задачу: Очистка устаревших токенов для скачивания файлов
     *
     * @var boolean
     */
    const FILE_OLDER_TOKENS_ENABLED = true;

    /**
     * Выполнять (true) или нет (false) cron-задачу: Очистка устаревших файлов во временном каталоге
     *
     * @var boolean
     */
    const FILE_OLDER_FILES_ENABLED = true;

    /**
     * Выполнять (true) или нет (false) cron-задачу: Ротация таблицы data_change_logs
     *
     * @var boolean
     */
    const DATA_CHANGE_LOGS_ROTATOR_ENABLED = true;
}
