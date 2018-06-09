<?php
/**
 * Добавление элемента в справочник
 *
 * @version 03.04.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Guide\Example;

use Lemurro\Api\Core\Abstracts\Action;

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
     * @version 03.04.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run($data)
    {
        return [
            'data' => [
                'id'   => 3,
                'name' => $data['name'],
            ],
        ];
    }
}
