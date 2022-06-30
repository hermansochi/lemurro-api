<?php

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\File\FileManipulate;
use Lemurro\Api\Core\Helpers\Response;
use RuntimeException;

/**
 * Добавление
 */
class ActionInsert extends Action
{
    /**
     * Добавление
     *
     * @param array $data Массив данных
     *
     * @return array
     */
    public function run($data)
    {
        return $this->dbal->transactional(function () use ($data): array {
            $cnt = $this->dbal->insert('example', [
                'name' => $data['name'],
                'created_at' => $this->dic['datetimenow'],
            ]);
            if ($cnt !== 1) {
                throw new RuntimeException('Произошла ошибка при добавлении записи, попробуйте ещё раз', 500);
            }

            $id = $this->dbal->lastInsertId();

            $this->dic['datachangelog']->insert('example', 'insert', $id, $data);

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
                        'files' => empty($manipulate['ids']) ? null : implode(',', $manipulate['ids'])
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
