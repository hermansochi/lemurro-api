<?php
/**
 * Изменение
 *
 * @version 28.03.2019
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\File\FileManipulate;
use Lemurro\Api\Core\Helpers\Response;

/**
 * Class ActionSave
 *
 * @package Lemurro\Api\App\Example
 */
class ActionSave extends Action
{
    /**
     * Выполним действие
     *
     * @param integer $id   ИД записи
     * @param array   $data Массив данных
     *
     * @return array
     *
     * @version 28.03.2019
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run($id, $data)
    {
        $record = (new OneRecord($this->dic))->get($id);

        if (is_object($record)) {
            $record->name = $data['name'];
            $record->updated_at = $this->dic['datetimenow'];
            $record->save();
            if (is_object($record) && isset($record->id)) {
                $this->dic['datachangelog']->insert('example', 'update', $record->id, $data);

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
                return Response::error500('Произошла ошибка при изменении записи, попробуйте ещё раз');
            }
        } else {
            return Response::error404('Запись не найдена');
        }
    }
}
