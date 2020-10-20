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
 * @version 14.10.2020
 */

use Lemurro\Api\Core\Cron\Jobby;

require 'vendor/autoload.php';

$jobby = (new Jobby(__DIR__))->init();

/* ЗДЕСЬ БУДУТ ВАШИ JOBBY-ЗАДАЧИ */

try {
    $jobby->run();
} catch (Exception $e) {
    file_put_contents(__DIR__ . '/cron.log', $e->getMessage(), FILE_APPEND);
}
