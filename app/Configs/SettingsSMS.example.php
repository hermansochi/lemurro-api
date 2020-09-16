<?php

/**
 * Параметры SMS
 *
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 * @version 21.11.2019
 */

namespace Lemurro\Api\App\Configs;

/**
 * Class SettingsSMS
 *
 * @package Lemurro\Api\App\Configs
 */
class SettingsSMS
{
    /**
     * API-ключ от аккаунта в sms.ru
     *
     * @var string
     */
    const SMSRU_API_ID = 'api_id';

    /**
     * Отправитель (можно оставить пустым, если не нужен)
     *
     * @var string
     */
    const SMSRU_SENDER = 'SenderName';
}
