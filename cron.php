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
 * @version 25.09.2020
 */

use Lemurro\Api\App\Configs\SettingsCron;
use Lemurro\Api\Core\Cron\Jobby;

require 'vendor/autoload.php';

$jobby = (new Jobby())->init();

/* ЗДЕСЬ БУДУТ ВАШИ JOBBY-ЗАДАЧИ */

try {
    $jobby->run();
} catch (Exception $e) {
    file_put_contents(SettingsCron::$log_file, $e->getMessage(), FILE_APPEND);
}