<?php
/**
 * Запуск cron-задач
 *
 * Добавить в crontab: * * * * * /path/to/php /path/to/lemurro-cron.php > /dev/null
 *
 * @version 10.01.2019
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

use Lemurro\Api\App\Configs\SettingsCron;
use Lemurro\Api\Core\Cron\Cron;
use Lemurro\Api\Core\Cron\Jobby;
use Lemurro\Api\Core\File\FileOlderFiles;
use Lemurro\Api\Core\File\FileOlderTokens;

date_default_timezone_set('UTC');

require '../api-vendor/autoload.php';

$jobby = Jobby::init();

// Выполняем задачу каждые 5 минут
try {
    $jobby->add('FileOlderTokens', [
        'enabled'  => true,
        'schedule' => '*/5 * * * *', // Каждые 5 минут
        'closure'  => function () {
            new Cron();

            (new FileOlderTokens)->clear();

            return true;
        },
    ]);
} catch (Exception $e) {
    file_put_contents(SettingsCron::LOG_FILE, $e->getMessage());
}

// Выполняем задачу каждый день в 0:00 UTC
try {
    $jobby->add('FileOlderFiles', [
        'enabled'  => true,
        'schedule' => '0 0 * * *', // Каждый день в 0:00
        'closure'  => function () {
            new Cron();

            (new FileOlderFiles)->clear();

            return true;
        },
    ]);
} catch (Exception $e) {
    file_put_contents(SettingsCron::LOG_FILE, $e->getMessage());
}

try {
    $jobby->run();
} catch (Exception $e) {
    file_put_contents(SettingsCron::LOG_FILE, $e->getMessage());
}