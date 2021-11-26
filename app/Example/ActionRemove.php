<?php

/**
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 30.10.2020
 */

namespace Lemurro\Api\App\Example;

use Illuminate\Support\Facades\DB;
use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * @package Lemurro\Api\App\Example
 */
class ActionRemove extends Action
{
    /**
     * @param integer $id ИД записи
     *
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     *
     * @version 30.10.2020
     */
    public function run($id): array
    {
        $record = (new OneRecord($this->dic))->get($id);

        if ($record === null) {
            return Response::error404('Запись не найдена');
        }

        $affected = DB::table('example')
            ->where('id', '=', $id)
            ->update([
                'name' => $record->name . ' (удалено: ' . $this->datetimenow . ')',
                'deleted_at' => $this->datetimenow,
            ]);

        if ($affected === 1) {
            $this->dic['datachangelog']->insert('example', 'delete', $id);
        }

        return Response::data([
            'id' => $record->id,
        ]);
    }
}
