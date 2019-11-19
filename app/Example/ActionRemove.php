<?php
/**
 * Удаление
 *
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 * @version 19.11.2019
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * Class ActionRemove
 *
 * @package Lemurro\Api\App\Example
 */
class ActionRemove extends Action
{
    /**
     * Выполним действие
     *
     * @param integer $id ИД записи
     *
     * @return array
     *
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     * @version 19.11.2019
     */
    public function run($id)
    {
        $record = (new OneRecord($this->dic))->get($id);

        if (is_object($record)) {
            $record->name = $record->name . ' (удалено: ' . $this->date_time_now . ')';
            $record->deleted_at = $this->date_time_now;
            $record->save();
            if (is_object($record) && isset($record->id)) {
                $this->data_change_log->insert('example', 'delete', $id);

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
