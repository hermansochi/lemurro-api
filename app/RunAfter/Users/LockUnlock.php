<?php

/**
 * После блокировки \ разблокировки пользователя
 *
 * @version 03.06.2019
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\RunAfter\Users;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * Class LockUnlock
 *
 * @package Lemurro\Api\App\RunAfter\Users
 */
class LockUnlock extends Action
{
    /**
     * Выполним действие
     *
     * @param array $data Массив данных для ответа
     *
     * @return array
     *
     * @version 03.06.2019
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run($data)
    {
        return Response::data($data);
    }
}
