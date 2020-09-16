<?php

/**
 * Параметры email
 *
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 * @version 21.11.2019
 */

namespace Lemurro\Api\App\Configs;

/**
 * Class SettingsMail
 *
 * @package Lemurro\Api\App\Configs
 */
class SettingsMail
{
    // ОСНОВНОЙ КАНАЛ

    /**
     * Почтовый адрес
     *
     * @var string
     */
    const APP_EMAIL = 'no-reply@domain.tld';

    /**
     * Отправка через SMTP с авторизацией
     *
     * @var boolean
     */
    const SMTP = true;

    /**
     * Тип протокола (ssl|tls)
     *
     * @var string
     */
    const SMTP_SECURITY = 'ssl';

    /**
     * Сервер
     *
     * @var string
     */
    const SMTP_HOST = 'HOST';

    /**
     * Порт
     *
     * @var integer
     */
    const SMTP_PORT = 0;

    /**
     * Адрес почты
     *
     * @var string
     */
    const SMTP_USERNAME = 'no-reply@domain.tld';

    /**
     * Пароль от почтового ящика
     *
     * @var string
     */
    const SMTP_PASSWORD = 'PASSWORD';

    // РЕЗЕРВНЫЙ КАНАЛ (ВСЕГДА SMTP)

    /**
     * Включить (true) или выключить (false) отправку через резервный канал, в случае сбоя отправки через основной
     *
     * @var boolean
     */
    const RESERVE = false;

    /**
     * Почтовый адрес
     *
     * @var string
     */
    const RESERVE_APP_EMAIL = 'no-reply@domain.tld';

    /**
     * Тип протокола (ssl|tls)
     *
     * @var string
     */
    const RESERVE_SMTP_SECURITY = 'ssl';

    /**
     * Сервер
     *
     * @var string
     */
    const RESERVE_SMTP_HOST = 'HOST';

    /**
     * Порт
     *
     * @var integer
     */
    const RESERVE_SMTP_PORT = 0;

    /**
     * Адрес почты
     *
     * @var string
     */
    const RESERVE_SMTP_USERNAME = 'no-reply@domain.tld';

    /**
     * Пароль от почтового ящика
     *
     * @var string
     */
    const RESERVE_SMTP_PASSWORD = 'PASSWORD';
}
