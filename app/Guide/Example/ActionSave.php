<?php

namespace Lemurro\Api\App\Guide\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * Изменение элемента в справочнике
 */
class ActionSave extends Action
{
    /**
     * Изменение элемента в справочнике
     *
     * @param integer $id   ИД записи
     * @param array   $data Массив данных
     *
     * @return array
     */
    public function run($id, $data)
    {
        $record = (new OneRecord($this->dic))->get((int)$id);
        if (empty($record)) {
            return Response::error404('Запись не найдена');
        }

        $cnt = $this->dbal->update('guide_example', [
            'name' => $data['name'],
            'updated_at' => $this->dic['datetimenow'],
        ], [
            'id' => $id
        ]);
        if ($cnt !== 1) {
            return Response::error500('Произошла ошибка при изменении записи, попробуйте ещё раз');
        }

        $this->dic['datachangelog']->insert('guide_example', 'update', $id, $data);

        return Response::data($data);
    }
}
