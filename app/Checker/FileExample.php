<?php

/**
 * Проверка прав доступа к файлу для раздела Example
 *
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 10.09.2020
 */

namespace Lemurro\Api\App\Checker;

use Lemurro\Api\Core\Exception\ResponseException;
use Lemurro\Api\Core\Helpers\File\FileChecker;
use Lemurro\Api\Core\Helpers\LogException;

/**
 * @package Lemurro\Api\App\Checker
 */
class FileExample extends FileChecker
{
    /**
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     *
     * @version 10.09.2020
     */
    public function check(string $container_id): bool
    {
        try {
            $this->checker->run([
                'role' => [
                    'page'   => 'example',
                    'access' => 'read',
                ],
            ]);

            return true;
        } catch (ResponseException $e) {
            LogException::write($this->log, $e);

            return false;
        }
    }
}
