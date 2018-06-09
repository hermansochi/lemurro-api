<?php
/**
 * Параметры SMS
 *
 * @version 01.01.2018
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
     * Шлюз по умолчанию
     */
    const DEFAULT_GATEWAY = 'smsru';

    /**
     * Шлюзы для отправки sms
     * p1sms - p1sms.ru
     * smsru - sms.ru
     */
    const GATEWAYS = [
        'p1sms' => [
            'user'     => 'user',
            'password' => 'password',
            'sender'   => 'sender',
        ],
        'smsru' => [
            'api_id' => 'api_id',
        ],
    ];
}
