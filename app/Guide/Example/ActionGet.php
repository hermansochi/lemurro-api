<?php

namespace Lemurro\Api\App\Guide\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * Получение элемента из справочника
 */
class ActionGet extends Action
{
    /**
     * Получение элемента из справочника
     *
     * @param integer $id ИД записи
     *
     * @return array
     */
    public function run($id)
    {
        $record = (new OneRecord($this->dic))->get((int)$id);
        if (empty($record)) {
            return Response::error404('Запись не найдена');
        }

        return Response::data($record);
    }
}
