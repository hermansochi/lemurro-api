<?php

/**
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 02.12.2020
 */

use Lemurro\Api\Core\Core;

header('Content-type: text/html; charset=UTF-8');

require_once __DIR__ . '/../vendor/autoload.php';

$path_root = __DIR__ . '/../';

$core = new Core($path_root, 'mysql');
$core->start();
