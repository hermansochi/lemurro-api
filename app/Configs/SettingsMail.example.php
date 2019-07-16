<?php
/**
 * Параметры email
 *
 * @version 16.07.2019
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Configs;

/**
 * Class SettingsMail
 *
 * @package Lemurro\Api\App\Configs
 */
class SettingsMail
{
    /**
     * Почта проекта
     */
    const APP_EMAIL = 'no-reply@domain.tld';

    // ОСНОВНОЙ КАНАЛ

    /**
     * Отправка через SMTP с авторизацией
     */
    const SMTP = true;

    /**
     * Тип протокола (ssl|tls)
     */
    const SMTP_SECURITY = 'ssl';

    /**
     * Сервер
     */
    const SMTP_HOST = 'HOST';

    /**
     * Порт
     */
    const SMTP_PORT = 'PORT';

    /**
     * Адрес почты
     */
    const SMTP_USERNAME = 'no-reply@domain.tld';

    /**
     * Пароль от почтового ящика
     */
    const SMTP_PASSWORD = 'PASSWORD';

    // РЕЗЕРВНЫЙ КАНАЛ (ВСЕГДА SMTP)

    /**
     * Отправка через SMTP с авторизацией
     */
    const RESERVE = false;

    /**
     * Тип протокола (ssl|tls)
     */
    const RESERVE_SMTP_SECURITY = 'ssl';

    /**
     * Сервер
     */
    const RESERVE_SMTP_HOST = 'HOST';

    /**
     * Порт
     */
    const RESERVE_SMTP_PORT = 'PORT';

    /**
     * Адрес почты
     */
    const RESERVE_SMTP_USERNAME = 'no-reply@domain.tld';

    /**
     * Пароль от почтового ящика
     */
    const RESERVE_SMTP_PASSWORD = 'PASSWORD';
}
