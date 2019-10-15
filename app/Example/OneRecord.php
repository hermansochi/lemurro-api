<?php
/**
 * Получим одну запись по ИД
 *
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 * @version 15.10.2019
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
     * @return ORM|false
     *
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     * @version 15.10.2019
     */
    public function get($id)
    {
        $record = ORM::for_table('example')
            ->where_null('deleted_at')
            ->find_one($id);

        if (!is_object($record) || $record->id != $id) {
            return false;
        }

        return $record;
    }
}
