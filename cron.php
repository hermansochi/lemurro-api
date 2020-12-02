<?php

/**
 * Запуск cron-задач
 *
 * Добавить в crontab: * * * * * /path/to/php /path/to/cron.php > /dev/null
 *
 * Минуты Часы Дни Месяцы ДниНедели
 *
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 02.12.2020
 */

use Lemurro\Api\Core\Cron\Jobby;

require 'vendor/autoload.php';

$path_root = __DIR__;

$jobby = (new Jobby($path_root, 'mysql'))->init();

/* ЗДЕСЬ БУДУТ ВАШИ JOBBY-ЗАДАЧИ */

try {
    $jobby->run();
} catch (Exception $e) {
    file_put_contents($path_root . '/cron.log', $e->getMessage(), FILE_APPEND);
}
