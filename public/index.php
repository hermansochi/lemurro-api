<?php

/**
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 02.11.2020
 */

use Lemurro\Api\Core\Core;

header('Content-type: text/html; charset=UTF-8');

require_once __DIR__ . '/../vendor/autoload.php';

$app_folder = __DIR__ . '/../';

$core = new Core($app_folder);
$core->start();
