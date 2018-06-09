<?php
/**
 * Изменение элемента в справочнике
 *
 * @version 03.04.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Guide\Example;

use Lemurro\Api\Core\Abstracts\Action;

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
     * @version 03.04.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run($id, $data)
    {
        return [
            'data' => [
                'id'   => $id,
                'name' => $data['name'],
            ],
        ];
    }
}
