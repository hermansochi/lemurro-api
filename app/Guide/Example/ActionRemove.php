<?php

namespace Lemurro\Api\App\Guide\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\Response;

/**
 * Удаление элемента из справочника
 */
class ActionRemove extends Action
{
    /**
     * Удаление элемента из справочника
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

        $this->dbal->transactional(function() use ($id, $record): void {
            $this->dbal->update('guide_example', [
                'name' => $record['name'] . ' (удалено: ' . $this->dic['datetimenow'] . ')',
                'deleted_at' => $this->dic['datetimenow'],
            ], [
                'id' => $record['id']
            ]);

            $this->dic['datachangelog']->insert('guide_example', 'delete', $id);
        });

        return Response::data([
            'id' => $record['id'],
        ]);
    }
}
