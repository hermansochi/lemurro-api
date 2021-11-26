<?php

/**
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 28.10.2020
 */

namespace Lemurro\Api\App\Guide\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * @package Lemurro\Api\App\Guide\Example
 */
class ActionGet extends Action
{
    /**
     * @param integer $id ИД записи
     *
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     *
     * @version 28.10.2020
     */
    public function run($id): array
    {
        $record = (new OneRecord($this->dic))->get($id);

        if ($record === null) {
            return Response::error404('Запись не найдена');
        }

        return Response::data((array) $record);
    }
}
