<?php
/**
 * Запуск cron-задач
 *
 * Добавить в crontab: * * * * * /path/to/php /path/to/cron.php > /dev/null
 *
 * Минуты Часы Дни Месяцы ДниНедели
 *
 * @version 23.08.2019
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

use Lemurro\Api\App\Configs\SettingsCron;
use Lemurro\Api\Core\Cron\Jobby;

require 'vendor/autoload.php';

$jobby = (new Jobby())->init();

/* ЗДЕСЬ БУДУТ ВАШИ JOBBY-ЗАДАЧИ */

try {
    $jobby->run();
} catch (Exception $e) {
    file_put_contents(SettingsCron::LOG_FILE, $e->getMessage(), FILE_APPEND);
}