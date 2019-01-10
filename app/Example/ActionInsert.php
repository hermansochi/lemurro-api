<?php
/**
 * Добавление
 *
 * @version 08.01.2019
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\File\FileManipulate;
use Lemurro\Api\Core\Helpers\Response;
use ORM;

/**
 * Class ActionInsert
 *
 * @package Lemurro\Api\App\Example
 */
class ActionInsert extends Action
{
    /**
     * Выполним действие
     *
     * @param array $data Массив данных
     *
     * @return array
     *
     * @version 08.01.2019
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run($data)
    {
        $record = ORM::for_table('example')->create();
        $record->name = $data['name'];
        $record->created_at = $this->dic['datetimenow'];
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
