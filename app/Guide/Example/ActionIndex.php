<?php
/**
 * Список справочника
 *
 * @version 24.12.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Guide\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;
use ORM;

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
     * @version 24.12.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run()
    {
        $items = ORM::for_table('guide_example')
            ->select_many('id', 'name')
            ->where_null('deleted_at')
            ->order_by_asc('name')
            ->find_array();
        if (is_array($items)) {
            return Response::data([
                    'js_class' => 'guideExample',
                    'count'    => count($items),
                    'items'    => $items,
                ]);
        } else {
            return Response::data([
                    'js_class' => 'guideExample',
                    'count'    => 0,
                    'items'    => [],
                ]);
        }
    }
}
