<?php

/**
 * После регистрации пользователя
 *
 * @version 24.12.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\RunAfter\Users;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * Class Register
 *
 * @package Lemurro\Api\App\RunAfter\Users
 */
class Register extends Action
{
    /**
     * Выполним действие
     *
     * @param array $data Массив данных для ответа
     *
     * @return array
     *
     * @version 24.12.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run($data)
    {
        return Response::data($data);
    }
}
