<?php

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\File\FileAdd;
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

        $cnt = $this->dbal->update('example', [
            'name' => $data['name'],
            'updated_at' => $this->dic['datetimenow'],
        ], [
            'id' => $id
        ]);
        if ($cnt !== 1) {
            return Response::error500('Произошла ошибка при изменении записи, попробуйте ещё раз');
        }

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
                $cnt = $this->dbal->update('example', [
                    'files' => empty($manipulate['ids']) ? null : implode(',', $manipulate['ids']),
                ], [
                    'id' => $id
                ]);
                if ($cnt !== 1) {
                    /** @var FileAdd $class_file_add */
                    $class_file_add = $manipulate['class_file_add'];
                    $class_file_add->undo();

                    return Response::error500('Произошла ошибка при сохранении файлов, попробуйте ещё раз');
                }
            }

            return Response::data([
                'id' => $id,
                'files_errors' => $manipulate['errors'],
            ]);
        } else {
            return Response::data([
                'id' => $id,
                'files_errors' => [],
            ]);
        }
    }
}
