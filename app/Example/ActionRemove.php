<?php

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * Удаление
 */
class ActionRemove extends Action
{
    /**
     * Удаление
     *
     * @param integer $id ИД записи
     *
     * @return array
     */
    public function run($id)
    {
        $record = (new OneRecord($this->dic))->get((int)$id);
        if (empty($record)) {
            return Response::error404('Запись не найдена');
        }

        $cnt = $this->dbal->update('example', [
            'name' => $record['name'] . ' (удалено: ' . $this->dic['datetimenow'] . ')',
            'deleted_at' => $this->dic['datetimenow'],
        ], [
            'id' => $id
        ]);
        if ($cnt !== 1) {
            return Response::error500('Произошла ошибка при удалении записи, попробуйте ещё раз');
        }

        $this->dic['datachangelog']->insert('example', 'delete', $id);

        return Response::data([
            'id' => $record['id'],
        ]);
    }
}
