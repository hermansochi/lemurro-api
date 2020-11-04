<?php

/**
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 30.10.2020
 */

namespace Lemurro\Api\App\Example;

use Illuminate\Support\Facades\DB;
use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\File\FileManipulate;
use Lemurro\Api\Core\Helpers\LogException;
use Lemurro\Api\Core\Helpers\Response;
use Throwable;

/**
 * @package Lemurro\Api\App\Example
 */
class ActionSave extends Action
{
    /**
     * @param integer $id   ИД записи
     * @param array   $data Массив данных
     *
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     *
     * @version 30.10.2020
     */
    public function run($id, $data): array
    {
        $manipulate = [];
        $files_ids = [];
        $files_errors = [];
        if (isset($data['files']) && is_array($data['files'])) {
            $container_type = 'Example';
            $container_id = $id;

            $manipulate = (new FileManipulate($this->dic))->run(
                $data['files'],
                $container_type,
                $container_id
            );

            if (!empty($manipulate['ids'])) {
                $files_ids = $manipulate['ids'];
            }

            $files_errors = $manipulate['errors'];
        }

        try {
            $affected = DB::table('example')
                ->where('id', '=', $id)
                ->update([
                    'name' => $data['name'],
                    'files' => (empty($files_ids) ? null : implode(',', $files_ids)),
                    'updated_at' => $this->datetimenow,
                ]);

            if ($affected === 0) {
                return Response::error404('Запись не найдена');
            }

            $this->dic['datachangelog']->insert('example', 'update', $id, $data);

            return Response::data([
                'id' => $id,
                'files_errors' => $files_errors,
            ]);
        } catch (Throwable $th) {
            LogException::write($this->dic['log'], $th);

            if (isset($manipulate['class_file_add'])) {
                /* @var FileAdd $class_file_add */
                $class_file_add = $manipulate['class_file_add'];
                $class_file_add->undo();
            }

            return Response::error500('Произошла ошибка при сохранении файлов, попробуйте ещё раз');
        }
    }
}
