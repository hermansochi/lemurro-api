<?php

namespace Lemurro\Api\App\Configs;

/**
 * Параметры аутентификации
 */
class SettingsAuth
{
    /**
     * Вид аутентификации
     *   email: по электронной почте (код через email)
     *   phone: по номеру телефона (код через смс)
     *   mixed: смешанная аутентификация (в поле auth_id может быть email или номер телефона)
     *
     * @var string
     */
    const TYPE = 'email';

    /**
     * Можно ли регистрировать новых пользователей (если при получении кода окажется что такого пользователя нет он будет создан)
     *
     * @var boolean
     */
    const CAN_REGISTRATION_USERS = false;

    /**
     * Количество генераций новых кодов в день
     *
     * @var int
     */
    const ATTEMPTS_PER_DAY = 50;

    /**
     * Время устаревания кодов аутентификации (в часах)
     *
     * @var integer
     */
    const AUTH_CODES_OLDER_THAN = 2;

    /**
     * Время устаревания сессий (в днях), сессии которыми не пользовались
     *
     * @var integer
     */
    const SESSIONS_OLDER_THAN = 30;

    /**
     * Привязка сессии к IP-адресу
     *
     * @var boolean
     */
    const SESSIONS_BINDING_TO_IP = false;
}
