<?php

/**
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 28.10.2020
 */

namespace Lemurro\Api\App\Guide\Example;

use Illuminate\Support\Facades\DB;
use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * @package Lemurro\Api\App\Guide\Example
 */
class ActionInsert extends Action
{
    /**
     * @param array $data Массив данных
     *
     * @return array
     *
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     *
     * @version 28.10.2020
     */
    public function run($data)
    {
        $id = DB::table('guide_example')->insertGetId([
            'name' => $data['name'],
            'created_at' => $this->datetimenow,
        ]);

        $data['id'] = $id;

        $this->dic['datachangelog']->insert('guide_example', 'insert', $id, $data);

        return Response::data($data);
    }
}
