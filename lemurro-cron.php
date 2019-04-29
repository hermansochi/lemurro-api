<?php
/**
 * Запуск cron-задач
 *
 * Добавить в crontab: * * * * * /path/to/php /path/to/lemurro-cron.php > /dev/null
 *
 * @version 29.04.2019
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
    file_put_contents(SettingsCron::LOG_FILE, $e->getMessage());
}