<?php
/**
 * Список
 *
 * @version 24.12.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;
use ORM;

/**
 * Class ActionIndex
 *
 * @package Lemurro\Api\App\Example
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
        $items = ORM::for_table('example')
            ->where_null('deleted_at')
            ->order_by_asc('name')
            ->find_array();

        if (is_array($items)) {
            return Response::data($items);
        } else {
            return Response::data([]);
        }
    }
}
