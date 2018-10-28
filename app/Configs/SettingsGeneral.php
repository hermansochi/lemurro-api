<?php
/**
 * Основные параметры
 *
 * @version 28.10.2018
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
     * Короткий путь до корня, с начальной и конечной "/"
     * Пример: "/" - если приложение находится в корне домена
     * Пример: "/proj_sub_folder/" - если приложение находится в каталоге
     */
    const SHORT_ROOT_PATH = '/';

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

    /**
     * Вид аутентификации
     *   email: по электронной почте (код через email)
     *   phone: по номеру телефона (код через смс)
     */
    const AUTH_TYPE = 'email';

    /**
     * Можно ли регистрировать новых пользователей (если при получении кода окажется что такого пользователя нет он будет создан)
     */
    const CAN_REGISTRATION_USERS = true;

    /**
     * Время устаревания кодов аутентификации (в часах)
     */
    const AUTH_CODES_OLDER_THAN = 2;

    /**
     * Время устаревания сессий (в днях), сессии которыми не пользовались
     */
    const SESSIONS_OLDER_THAN = 30;

    /**
     * Привязка сессии к IP-адресу
     */
    const SESSIONS_BINDING_TO_IP = false;
}
