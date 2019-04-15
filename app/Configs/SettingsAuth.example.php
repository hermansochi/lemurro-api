<?php
/**
 * Параметры аутентификации
 *
 * @version 12.12.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Configs;

/**
 * Class SettingsAuth
 *
 * @package Lemurro\Api\App\Configs
 */
class SettingsAuth
{
    /**
     * Вид аутентификации
     *   email: по электронной почте (код через email)
     *   phone: по номеру телефона (код через смс)
     */
    const TYPE = 'email';

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
