<?php
/**
 * Добавление элемента в справочник
 *
 * @version 12.12.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Guide\Example;

use Lemurro\Api\Core\Abstracts\Action;
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
     * @version 12.12.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run($data)
    {
        $record = ORM::for_table('guide_example')->create();
        $record->name = $data['name'];
        $record->created_at = $this->dic['datetimenow'];
        $record->save();
        if (is_object($record) && isset($record->id)) {
            $data['id'] = $record->id;

            $this->dic['datachangelog']->insert('guide_example', 'insert', $record->id, $data);

            return [
                'data' => $data,
            ];
        } else {
            return [
                'errors' => [
                    [
                        'status' => '500 Internal Server Error',
                        'code'   => 'danger',
                        'title'  => 'Произошла ошибка при добавлении записи, попробуйте ещё раз',
                    ],
                ],
            ];
        }
    }
}
