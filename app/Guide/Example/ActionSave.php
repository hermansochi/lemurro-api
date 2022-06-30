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

        $this->dbal->transactional(function() use ($id, $data): void {
            $this->dbal->update('guide_example', [
                'name' => $data['name'],
                'updated_at' => $this->dic['datetimenow'],
            ], [
                'id' => $id
            ]);

            $this->dic['datachangelog']->insert('guide_example', 'update', $id, $data);
        });

        return Response::data($data);
    }
}
