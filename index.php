<?php
/**
 * Запуск приложения
 *
 * @version 24.12.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

use Lemurro\Api\Core\Core;

header("Content-type: text/html; charset=UTF-8");

require '../api-vendor/autoload.php';

date_default_timezone_set('UTC');

$core = new Core();
$core->start();
