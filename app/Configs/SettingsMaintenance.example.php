<?php
/**
 * Параметры обслуживания
 *
 * При включении блокирует все запросы и возвращает ошибку с текстом из константы "MESSAGE"
 * Не блокирует запросы пользователей с правами "Администратор"
 *
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 * @version 21.11.2019
 */

namespace Lemurro\Api\App\Configs;

/**
 * Class SettingsMaintenance
 *
 * @package Lemurro\Api\App\Configs
 */
class SettingsMaintenance
{
    /**
     * Включить \ Выключить обслуживание проекта
     *
     * @var boolean
     */
    const ACTIVE = false;

    /**
     * Сообщение об обслуживании
     *
     * @var string
     */
    const MESSAGE = 'Проект "' . SettingsGeneral::APP_NAME . '" временно остановлен для обслуживания, пожалуйста повторите через 5 минут или обновите страницу';
}
