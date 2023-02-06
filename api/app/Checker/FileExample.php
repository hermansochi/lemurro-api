<?php
/**
 * Проверка прав доступа к файлу для раздела Example
 *
 * @version 28.03.2019
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Checker;

use Lemurro\Api\Core\Helpers\File\FileChecker;

/**
 * Class FileExample
 *
 * @package Lemurro\Api\App\Checker
 */
class FileExample extends FileChecker
{
    /**
     * Проверка прав доступа
     *
     * @param string $container_id ИД контейнера
     *
     * @return boolean
     *
     * @version 08.01.2019
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function check($container_id)
    {
        $checker_checks = [
            'role' => [
                'page'   => 'example',
                'access' => 'read',
            ],
        ];
        $checker_result = $this->dic['checker']->run($checker_checks);
        if (is_array($checker_result) && count($checker_result) == 0) {
            return true;
        } else {
            return false;
        }
    }
}