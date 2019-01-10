<?php
/**
 * Параметры загрузки файлов
 *
 * @version 08.01.2019
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Configs;

/**
 * Class SettingsFile
 *
 * @package Lemurro\Api\App\Configs
 */
class SettingsFile
{
    /**
     * Путь до каталога upload
     *
     * @var string
     */
    const ROOT_FOLDER = SettingsPath::FULL_ROOT . 'upload/';

    /**
     * Путь до временного хранилища
     *
     * @var string
     */
    const TEMP_FOLDER = SettingsFile::ROOT_FOLDER . 'temp/';

    /**
     * Путь до постоянного хранилища
     *
     * @var string
     */
    const FILE_FOLDER = SettingsFile::ROOT_FOLDER . 'documents/';

    /**
     * Полное удаление файлов
     *   true - файл удаляется физически, а также удаляется запись в БД
     *   false - файл физически не удаляется, а в БД помечается как удалённый
     *
     * @var boolean
     */
    const FULL_REMOVE = true;

    /**
     * Через сколько дней временный файл считать устаревшим
     *
     * @var integer
     */
    const OUTDATED_FILE_DAYS = 5;

    /**
     * Через сколько часов токен на скачивание файла считать устаревшим
     *
     * @var integer
     */
    const TOKENS_OLDER_THAN_HOURS = 12;

    /**
     * Максимальный размер загружаемого файла (в байтах)
     *
     * @var integer
     */
    const ALLOWED_SIZE = 2097152; // 2 MB

    /**
     * Формат сообщения о превышении лимита размера загружаемого файла
     *
     * @var string
     */
    const MAX_SIZE_FORMATED = '2 MB';

    /**
     * Массив разрешенных типов
     *
     * @var array
     */
    const ALLOWED_TYPES = [
        'application/pdf', // pdf
        'application/msword', // doc
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // docx
        'application/vnd.ms-excel', // xls
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // xlsx
        'application/zip', // zip
        'application/x-rar', // rar
    ];

    /**
     * Массив разрешенных расширений
     *
     * @var array
     */
    const ALLOWED_EXTENSIONS = [
        'pdf',
        'doc',
        'docx',
        'xls',
        'xlsx',
        'zip',
        'rar',
    ];
}
