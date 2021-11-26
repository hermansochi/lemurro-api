<?php

/**
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 28.10.2020
 */

namespace Lemurro\Api\App\Example;

use Illuminate\Support\Facades\DB;
use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * @package Lemurro\Api\App\Example
 */
class ActionIndex extends Action
{
    /**
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     *
     * @version 28.10.2020
     */
    public function run(): array
    {
        $items = DB::table('example')
            ->whereNull('deleted_at')
            ->orderBy('name')
            ->get();

        return Response::data($items);
    }
}
