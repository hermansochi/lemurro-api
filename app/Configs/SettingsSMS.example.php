<?php
/**
 * Параметры SMS
 *
 * @version 15.10.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
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
     */
    const SMSRU_API_ID = 'api_id';

    /**
     * Отправитель (можно оставить пустым, если не нужен)
     */
    const SMSRU_SENDER = 'SenderName';
}
