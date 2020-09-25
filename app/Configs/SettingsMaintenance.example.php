<?php

/**
 * Параметры обслуживания
 *
 * При включении блокирует все запросы и возвращает ошибку с текстом из константы "MESSAGE"
 * Не блокирует запросы пользователей с правами "Администратор"
 *
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 25.09.2020
 */

namespace Lemurro\Api\App\Configs;

use Lemurro\Api\Core\Abstracts\AbstractSettingsMaintenance;

/**
 * @package Lemurro\Api\App\Configs
 */
class SettingsMaintenance extends AbstractSettingsMaintenance
{
}
