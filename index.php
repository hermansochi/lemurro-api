<?php
/**
 * Запуск приложения
 *
 * @version 10.01.2019
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

use Lemurro\Api\Core\Core;

header("Content-type: text/html; charset=UTF-8");

require 'vendor/autoload.php';

date_default_timezone_set('UTC');

$core = new Core();
$core->start();
