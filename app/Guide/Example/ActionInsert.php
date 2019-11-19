<?php
/**
 * Добавление элемента в справочник
 *
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 * @version 19.11.2019
 */

namespace Lemurro\Api\App\Guide\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;
use ORM;

/**
 * Class ActionInsert
 *
 * @package Lemurro\Api\App\Guide\Example
 */
class ActionInsert extends Action
{
    /**
     * Выполним действие
     *
     * @param array $data Массив данных
     *
     * @return array
     *
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     * @version 19.11.2019
     */
    public function run($data)
    {
        $record = ORM::for_table('guide_example')->create();
        $record->name = $data['name'];
        $record->created_at = $this->date_time_now;
        $record->save();
        if (is_object($record) && isset($record->id)) {
            $data['id'] = $record->id;

            $this->data_change_log->insert('guide_example', 'insert', $record->id, $data);

            return Response::data($data);
        } else {
            return Response::error500('Произошла ошибка при добавлении записи, попробуйте ещё раз');
        }
    }
}
