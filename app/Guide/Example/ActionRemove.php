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

        $affected = DB::table('guide_example')
            ->where('id', '=', $id)
            ->update([
                'name' => $record->name . ' (удалено: ' . $this->datetimenow . ')',
                'deleted_at' => $this->datetimenow,
            ]);

        if ($affected === 1) {
            $this->dic['datachangelog']->insert('guide_example', 'delete', $id);
        }

        return Response::data([
            'id' => $record->id,
        ]);
    }
}
