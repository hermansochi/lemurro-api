<?php

/**
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 30.10.2020
 */

namespace Lemurro\Api\App\Guide\Example;

use Illuminate\Support\Facades\DB;
use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * @package Lemurro\Api\App\Guide\Example
 */
class ActionSave extends Action
{
    /**
     * @param integer $id   ИД записи
     * @param array   $data Массив данных
     *
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     *
     * @version 30.10.2020
     */
    public function run($id, $data): array
    {
        $affected = DB::table('guide_example')
            ->where('id', '=', $id)
            ->update([
                'name' => $data['name'],
                'updated_at' => $this->datetimenow,
            ]);

        if ($affected === 0) {
            return Response::error404('Запись не найдена');
        }

        $this->dic['datachangelog']->insert('guide_example', 'update', $id, $data);

        return Response::data($data);
    }
}
