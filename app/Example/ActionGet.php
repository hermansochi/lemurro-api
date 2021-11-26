<?php

/**
 * Получение
 *
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 *
 * @version 19.06.2020
 */

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\File\FileInfo;
use Lemurro\Api\Core\Helpers\Response;

/**
 * Class ActionGet
 *
 * @package Lemurro\Api\App\Example
 */
class ActionGet extends Action
{
    /**
     * Выполним действие
     *
     * @param integer $id ИД записи
     *
     * @return array
     *
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     *
     * @version 19.06.2020
     */
    public function run($id)
    {
        $record = (new OneRecord($this->dic))->get($id);

        if (is_object($record)) {
            $data = $record->as_array();

            if (!empty($data['files'])) {
                $files_ids = explode(',', $data['files']);
                $files_info = (new FileInfo())->getMany($files_ids);

                if (!$files_info['success']) {
                    $data['files'] = [];
                } else {
                    $data['files'] = $files_info['data'];
                }
            }

            return Response::data($data);
        } else {
            return Response::error404('Запись не найдена');
        }
    }
}
