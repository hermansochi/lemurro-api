<?php

/**
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 09.09.2020
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\File\FileManipulate;
use Lemurro\Api\Core\Helpers\Response;
use ORM;

/**
 * @package Lemurro\Api\App\Example
 */
class ActionInsert extends Action
{
    /**
     * @param array $data Массив данных
     *
     * @return array
     *
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     *
     * @version 09.09.2020
     */
    public function run($data)
    {
        $record = ORM::for_table('example')->create();
        $record->name = $data['name'];
        $record->created_at = $this->datetimenow;
        $record->save();
        if (is_object($record) && isset($record->id)) {
            $this->dic['datachangelog']->insert('example', 'insert', $record->id, $data);

            if (isset($data['files']) && is_array($data['files'])) {
                $container_type = 'example';
                $container_id = $record->id;

                $manipulate = (new FileManipulate($this->dic))->run(
                    $data['files'],
                    $container_type,
                    $container_id
                );

                if (!empty($manipulate['ids'])) {
                    $record->files = (empty($manipulate['ids']) ? null : implode(',', $manipulate['ids']));
                    $record->save();
                    if (!is_object($record)) {
                        /* @var FileAdd $class_file_add */
                        $class_file_add = $manipulate['class_file_add'];
                        $class_file_add->undo();

                        return Response::error500('Произошла ошибка при сохранении файлов, попробуйте ещё раз');
                    }
                }

                return Response::data([
                    'id'           => $record->id,
                    'files_errors' => $manipulate['errors'],
                ]);
            } else {
                return Response::data([
                    'id'           => $record->id,
                    'files_errors' => [],
                ]);
            }
        } else {
            return Response::error500('Произошла ошибка при добавлении записи, попробуйте ещё раз');
        }
    }
}
