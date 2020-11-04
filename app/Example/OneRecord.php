<?php

/**
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 28.10.2020
 */

namespace Lemurro\Api\App\Example;

use Illuminate\Support\Facades\DB;
use Lemurro\Api\Core\Abstracts\Action;

/**
 * @package Lemurro\Api\App\Example
 */
class OneRecord extends Action
{
    /**
     * @param integer $id ИД записи
     *
     * @return object|null
     *
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     *
     * @version 28.10.2020
     */
    public function get($id)
    {
        return DB::table('example')
            ->whereNull('deleted_at')
            ->where('id', '=', $id)
            ->first();
    }
}
