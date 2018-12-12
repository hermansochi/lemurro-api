<?php
/**
 * Параметры БД
 *
 * @version 12.12.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Configs;

/**
 * Class SettingsDatabase
 *
 * @package Lemurro\Api\App\Configs
 */
class SettingsDatabase
{
    /**
     * Нужно ли подключаться к БД
     */
    const NEED_CONNECT = true;

    /**
     * Сервер
     */
    const HOST = '127.0.0.1';

    /**
     * Порт
     */
    const PORT = 3306;

    /**
     * Имя БД
     */
    const DBNAME = 'lemurro';

    /**
     * Пользователь
     */
    const USERNAME = 'root';

    /**
     * Пароль
     */
    const PASSWORD = '';

    /**
     * Сбор выполняемых запросов:
     * ORM::get_last_query() (Возвращает строку)
     * ORM::get_query_log() (Возвращает массив)
     */
    const LOGGING = true;
}
