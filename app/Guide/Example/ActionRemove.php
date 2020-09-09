<?php

/**
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 09.09.2020
 */

namespace Lemurro\Api\App\Guide\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * @package Lemurro\Api\App\Guide\Example
 */
class ActionRemove extends Action
{
    /**
     * @param integer $id ИД записи
     *
     * @return array
     *
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     *
     * @version 09.09.2020
     */
    public function run($id)
    {
        $record = (new OneRecord($this->dic))->get($id);

        if (is_object($record)) {
            $record->name = $record->name . ' (удалено: ' . $this->datetimenow . ')';
            $record->deleted_at = $this->datetimenow;
            $record->save();
            if (is_object($record) && isset($record->id)) {
                $this->dic['datachangelog']->insert('guide_example', 'delete', $id);

                return Response::data([
                    'id' => $record->id,
                ]);
            } else {
                return Response::error500('Произошла ошибка при удалении записи, попробуйте ещё раз');
            }
        } else {
            return Response::error404('Запись не найдена');
        }
    }
}
