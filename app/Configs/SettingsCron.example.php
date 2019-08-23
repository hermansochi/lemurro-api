<?php
/**
 * Параметры cron-задач
 *
 * @version 23.08.2019
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
     * Префикс для имён заданий
     *
     * В случае, когда у вас на одном сервере несколько проектов, имена задач обязательно должны отличаться,
     * иначе это приводит к конфликтам при запуске задач
     */
    const NAME_PREFIX = 'MyApp1';

    /**
     * Путь до лог-файла
     */
    const LOG_FILE = SettingsPath::LOGS . 'cron.log';

    /**
     * Массив email-адресов, куда отправлять письма с ошибками
     */
    const ERRORS_EMAILS = [];

    /**
     * Выполнять (true) или нет (false) cron-задачу: Очистка устаревших токенов для скачивания файлов
     */
    const FILE_OLDER_TOKENS_ENABLED = true;

    /**
     * Выполнять (true) или нет (false) cron-задачу: Очистка устаревших файлов во временном каталоге
     */
    const FILE_OLDER_FILES_ENABLED = true;

    /**
     * Выполнять (true) или нет (false) cron-задачу: Ротация таблицы data_change_logs
     */
    const DATA_CHANGE_LOGS_ROTATOR_ENABLED = true;
}
