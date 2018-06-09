<?php
/**
 * Параметры email
 *
 * @version 01.01.2018
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
}
