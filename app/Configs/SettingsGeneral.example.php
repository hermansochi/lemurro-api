<?php

/**
 * Основные параметры
 *
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 14.08.2020
 */

namespace Lemurro\Api\App\Configs;

/**
 * Class SettingsGeneral
 *
 * @package Lemurro\Api\App\Configs
 */
class SettingsGeneral
{
    /**
     * Имя проекта
     *
     * @var string
     */
    public const APP_NAME = 'Lemurro';

    /**
     * Это боевой сервер если стоит значение true
     *
     * @deprecated 2.0
     *
     * @var boolean
     */
    public const PRODUCTION = false;

    /**
     * Вид сервера
     *
     * @var string
     */
    public const SERVER_TYPE = self::SERVER_TYPE_DEV;

    /**
     * Вид сервера: разработчика
     *
     * @var string
     */
    public const SERVER_TYPE_DEV = 'dev';

    /**
     * Вид сервера: тестовый
     *
     * @var string
     */
    public const SERVER_TYPE_TEST = 'test';

    /**
     * Вид сервера: боевой
     *
     * @var string
     */
    public const SERVER_TYPE_PROD = 'prod';
}
