<?php

namespace Lemurro\Api\App\Example;

use Lemurro\Api\Core\Abstracts\Action;
use Lemurro\Api\Core\Helpers\File\FileInfo;
use Lemurro\Api\Core\Helpers\Response;

/**
 * Получение
 */
class ActionGet extends Action
{
    /**
     * Получение
     *
     * @param integer $id ИД записи
     *
     * @return array
     */
    public function run($id)
    {
        $record = (new OneRecord($this->dic))->get((int)$id);
        if (empty($record)) {
            return Response::error404('Запись не найдена');
        }

        if (!empty($record['files'])) {
            $files_ids = explode(',', $record['files']);
            $files_info = (new FileInfo())->getMany($files_ids);

            if (!$files_info['success']) {
                $record['files'] = [];
            } else {
                $record['files'] = $files_info['data'];
            }
        }

        return Response::data($record);
    }
}
