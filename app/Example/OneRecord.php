<?php
/**
 * Получим одну запись по ИД
 *
 * @version 28.10.2018
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use ORM;

/**
 * Class OneRecord
 *
 * @package Lemurro\Api\App\Example
 */
class OneRecord extends Action
{
    /**
     * Выполним действие
     *
     * @param integer $id ИД записи
     *
     * @return ORM
     *
     * @version 28.10.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function get($id)
    {
        return ORM::for_table('example')
            ->where_null('deleted_at')
            ->find_one($id);
    }
}
