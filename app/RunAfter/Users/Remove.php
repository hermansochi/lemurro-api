<?php
/**
 * После удаления пользователя
 *
 * @version 19.04.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\RunAfter\Users;

use Lemurro\Api\Core\Abstracts\Action;

/**
 * Class Remove
 *
 * @package Lemurro\Api\App\RunAfter\Users
 */
class Remove extends Action
{
    /**
     * Выполним действие
     *
     * @param array $data Массив данных для ответа
     *
     * @return array
     *
     * @version 19.04.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run($data)
    {
        return [
            'data' => $data,
        ];
    }
}
