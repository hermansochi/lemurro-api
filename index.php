<?php
/**
 * Запуск приложения
 *
 * @version 10.11.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

use Lemurro\Api\App\Configs\SettingsGeneral;
use Lemurro\Api\Core\Core;

header("Content-type: text/html; charset=UTF-8");

require '../lemurro-composer-vendors/api/autoload.php';

date_default_timezone_set(SettingsGeneral::TIMEZONE);

$core = new Core();
$core->start();
