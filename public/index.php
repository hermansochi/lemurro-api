<?php
/**
 * Запуск приложения
 *
 * @version 29.04.2019
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

use Lemurro\Api\Core\Core;

header("Content-type: text/html; charset=UTF-8");

require '../vendor/autoload.php';

$core = new Core();
$core->start();
