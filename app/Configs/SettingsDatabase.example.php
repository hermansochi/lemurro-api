<?php

namespace Lemurro\Api\App\Configs;

/**
 * Параметры БД
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
}
