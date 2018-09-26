<?php
/**
 * Список справочника
 *
 * @version 26.09.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Guide\Example;

use Lemurro\Api\Core\Abstracts\Action;

/**
 * Class ActionIndex
 *
 * @package Lemurro\Api\App\Guide\Example
 */
class ActionIndex extends Action
{
    /**
     * Выполним действие
     *
     * @return array
     *
     * @version 26.09.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run()
    {
        return [
            'data' => [
                'js_class' => 'guideExample',
                'items'    => [
                    [
                        'id'   => 1,
                        'name' => 'Первая запись',
                    ],
                    [
                        'id'   => 2,
                        'name' => 'Вторая запись',
                    ],
                ],
            ],
        ];
    }
}
