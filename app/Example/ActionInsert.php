<?php

/**
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 28.10.2020
 */

namespace Lemurro\Api\App\Example;

use Illuminate\Support\Facades\DB;
use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\File\FileManipulate;
use Lemurro\Api\Core\Helpers\Response;

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
     * @version 28.10.2020
     */
    public function run($data)
    {
        $id = DB::table('example')->insertGetId([
            'name' => $data['name'],
            'created_at' => $this->datetimenow,
        ]);

        $this->dic['datachangelog']->insert('example', 'insert', $id, $data);

        $files_errors = [];
        if (isset($data['files']) && is_array($data['files'])) {
            $manipulate = (new FileManipulate($this->dic))->run($data['files'], 'Example', $id);

            if (!empty($manipulate['ids'])) {
                $affected = DB::table('example')
                    ->where('id', '=', $id)
                    ->update([
                        'files' => (empty($manipulate['ids']) ? null : implode(',', $manipulate['ids'])),
                    ]);

                if ($affected === 0) {
                    /* @var FileAdd $class_file_add */
                    $class_file_add = $manipulate['class_file_add'];
                    $class_file_add->undo();

                    return Response::error500('Произошла ошибка при сохранении файлов, попробуйте ещё раз');
                }
            }

            $files_errors = $manipulate['errors'];
        }

        return Response::data([
            'id' => $id,
            'files_errors' => $files_errors,
        ]);
    }
}
