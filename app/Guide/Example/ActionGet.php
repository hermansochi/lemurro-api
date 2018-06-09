<?php
/**
 * Получение элемента из справочника
 *
 * @version 03.04.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Guide\Example;

use Lemurro\Api\Core\Abstracts\Action;

/**
 * Class ActionGet
 *
 * @package Lemurro\Api\App\Guide\Example
 */
class ActionGet extends Action
{
    /**
     * Выполним действие
     *
     * @param integer $id ИД записи
     *
     * @return array
     *
     * @version 03.04.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run($id)
    {
        return [
            'data' => [
                'id'   => $id,
                'name' => 'Имя записи',
            ],
        ];
    }
}
