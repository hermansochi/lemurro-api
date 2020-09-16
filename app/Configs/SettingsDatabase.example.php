<?php

/**
 * Параметры БД
 *
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 * @version 21.11.2019
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
     *
     * @var boolean
     */
    const NEED_CONNECT = true;

    /**
     * Сервер
     *
     * @var string
     */
    const HOST = '127.0.0.1';

    /**
     * Порт
     *
     * @var integer
     */
    const PORT = 3306;

    /**
     * Имя БД
     *
     * @var string
     */
    const DBNAME = 'lemurro';

    /**
     * Пользователь
     *
     * @var string
     */
    const USERNAME = 'root';

    /**
     * Пароль
     *
     * @var string
     */
    const PASSWORD = '';

    /**
     * Сбор выполняемых запросов:
     * ORM::get_last_query() (Возвращает строку)
     * ORM::get_query_log() (Возвращает массив)
     *
     * @var boolean
     */
    const LOGGING = true;
}
