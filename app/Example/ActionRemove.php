<?php
/**
 * Удаление
 *
 * @version 24.12.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
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
     * @version 24.12.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run($id)
    {
        $record = (new OneRecord($this->dic))->get($id);

        if (is_object($record)) {
            $record->name = $record->name . ' (удалено: ' . $this->dic['datetimenow'] . ')';
            $record->deleted_at = $this->dic['datetimenow'];
            $record->save();
            if (is_object($record) && isset($record->id)) {
                $this->dic['datachangelog']->insert('example', 'delete', $id);

                return Response::data([
                    'id' => $record->id,
                ]);
            } else {
                return Response::error(
                    '500 Internal Server Error',
                    'danger',
                    'Произошла ошибка при удалении записи, попробуйте ещё раз'
                );
            }
        } else {
            return Response::error(
                '404 Not Found',
                'info',
                'Запись не найдена'
            );
        }
    }
}
