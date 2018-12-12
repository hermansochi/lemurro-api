<?php
/**
 * Добавление
 *
 * @version 12.12.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
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
     * @version 12.12.2018
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

            return [
                'data' => [
                    'id' => $record->id,
                ],
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
