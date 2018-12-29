<?php
/**
 * Добавление
 *
 * @version 29.12.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;
use ORM;

/**
 * Class ActionInsert
 *
 * @package Lemurro\Api\App\Example
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
     * @version 29.12.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run($data)
    {
        $record = ORM::for_table('example')->create();
        $record->name = $data['name'];
        $record->created_at = $this->dic['datetimenow'];
        $record->save();
        if (is_object($record) && isset($record->id)) {
            $this->dic['datachangelog']->insert('example', 'insert', $record->id, $data);

            return Response::data([
                'id' => $record->id,
            ]);
        } else {
            return Response::error500('Произошла ошибка при добавлении записи, попробуйте ещё раз');
        }
    }
}
