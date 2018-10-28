<?php
/**
 * Изменение
 *
 * @version 28.10.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;

/**
 * Class ActionSave
 *
 * @package Lemurro\Api\App\Example
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
     * @version 28.10.2018
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
                $this->dic['datachangelog']->insert('example', 'update', $record->id, $data);

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
                            'title'  => 'Произошла ошибка при изменении записи, попробуйте ещё раз',
                        ],
                    ],
                ];
            }
        } else {
            return [
                'errors' => [
                    [
                        'status' => '404 Not Found',
                        'code'   => 'info',
                        'title'  => 'Запись не найдена',
                    ],
                ],
            ];
        }
    }
}
