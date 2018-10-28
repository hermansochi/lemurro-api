<?php
/**
 * Список
 *
 * @version 28.10.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
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
     * @version 28.10.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run()
    {
        $items = ORM::for_table('example')
            ->where_null('deleted_at')
            ->order_by_asc('name')
            ->find_array();

        if (is_array($items)) {
            return [
                'data' => $items,
            ];
        } else {
            return [
                'data' => [],
            ];
        }
    }
}
