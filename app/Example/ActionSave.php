<?php

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\File\FileManipulate;
use Lemurro\Api\Core\Helpers\Response;

/**
 * Изменение
 */
class ActionSave extends Action
{
    /**
     * Изменение
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

        return $this->dbal->transactional(function () use ($id, $data): array {
            $this->dbal->update('example', [
                'name' => $data['name'],
                'updated_at' => $this->dic['datetimenow'],
            ], [
                'id' => $id
            ]);

            $this->dic['datachangelog']->insert('example', 'update', $id, $data);

            if (isset($data['files']) && is_array($data['files'])) {
                $container_type = 'example';
                $container_id = $id;

                $manipulate = (new FileManipulate($this->dic))->run(
                    $data['files'],
                    $container_type,
                    $container_id
                );

                if (!empty($manipulate['ids'])) {
                    $this->dbal->update('example', [
                        'files' => empty($manipulate['ids']) ? null : implode(',', $manipulate['ids']),
                    ], [
                        'id' => $id
                    ]);
                }

                return Response::data([
                    'id' => $id,
                    'files_errors' => $manipulate['errors'],
                ]);
            }

            return Response::data([
                'id' => $id,
                'files_errors' => [],
            ]);
        });
    }
}
