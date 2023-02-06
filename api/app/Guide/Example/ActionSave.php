<?php
/**
 * Изменение элемента в справочнике
 *
 * @version 29.12.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Guide\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * Class ActionSave
 *
 * @package Lemurro\Api\App\Guide\Example
 */
class ActionSave extends Action
{
    /**
     * Выполним действие
     *
     * @param integer $id   ИД записи
     * @param array   $data Массив данных
     *
     * @return array
     *
     * @version 29.12.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run($id, $data)
    {
        $record = (new OneRecord($this->dic))->get($id);

        if (is_object($record)) {
            $record->name = $data['name'];
            $record->updated_at = $this->dic['datetimenow'];
            $record->save();
            if (is_object($record) && isset($record->id)) {
                $this->dic['datachangelog']->insert('guide_example', 'update', $id, $data);

                return Response::data($data);
            } else {
                return Response::error500('Произошла ошибка при изменении записи, попробуйте ещё раз');
            }
        } else {
            return Response::error404('Запись не найдена');
        }
    }
}
